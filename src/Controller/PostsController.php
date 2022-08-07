<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Users'],
        // ];
        
        // $posts = $this->paginate($this->Posts);


        $posts= $this->paginate(
            $this->Posts
            ->find()
            ->contain(['Users', 'Comments', 'Likes'])
            ->order(['Posts.created'=>'DESC'])

        );
        $this->set(['posts'=> $posts]);

    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments', 'Comments.Users', 'Likes'],
            'limit' => 5
        ]);
        
        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->getAttribute('identity') == null ) {
			$this->Flash->error('Veuillez vous connecter avant de poster');
			return $this->redirect(['controller' => 'Users','action' => 'index']);
		}

        $post = $this->Posts->newEmptyEntity();
        $post->set(['user_id'=>$this->request->getAttribute('identity')->id]);


        if ($this->request->is('post' , 'put')) {

            if(empty($this->request->getData('content')->getClientFilename()) || !in_array($this->request->getData('content')->getClientMediaType(), ['gif','image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/mp4'])){
				$this->Flash->error('Format pas compatible');
			}else{
                $post = $this->Posts->patchEntity($post, $this->request->getData());
                $postImg = pathinfo($this->request->getData('content')->getClientFilename(), PATHINFO_EXTENSION);
				$newImgName = 'user-'.time().'.'.$postImg;
				$oldImgName = $post->content;
				$post->content = $newImgName;
				$post->content = $newImgName;
                if ($this->Posts->save($post)) {

                    if(!empty($oldImgName) && file_exists(WWW_ROOT.'img/posts/'.$oldImgName)){
						unlink(WWW_ROOT.'img/posts/'.$oldImgName);
					}
					$this->request->getData('content')->moveTo(WWW_ROOT.'img/posts/'.$newImgName);

					// $this->Flash->success('Image ajoutée');
                    // $this->Flash->success(__('The post has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                else{
                    var_dump('error');
                }

            }

            
            
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }

        // $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        // $this->set(compact('post', 'users', 'myUser'));
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if($id == null) {
			return $this->redirect(['controller' => 'Users','action' => 'index']);
		}
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);


        if($post->user_id != $this->request->getAttribute('identity')->id) {
            $this->Flash->error('Vous n\'avez pas le droit de modifier ce post');
			return $this->redirect(['controller' => 'Posts','action' => 'view', $id]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
