<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Likes Controller
 *
 * @property \App\Model\Table\LikesTable $Likes
 * @method \App\Model\Entity\Like[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LikesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Posts'],
        ];
        $likes = $this->paginate($this->Likes);

        $this->set(compact('likes'));
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => ['Users', 'Posts'],
        ]);

        $this->set(compact('like'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($post)
    {

        $like = $this->Likes->newEmptyEntity();
        $like->set(['user_id'=>$this->request->getAttribute('identity')->id]);
        $like->set(['post_id'=>$post]);

        if ($this->Likes->save($like)) {
            // return $this->redirect(['controller'=>'Posts','action' => 'index']);
            $this->response = $this->response->withStringBody(json_encode(['success'=>true]));
            $this->response= $this->response->withType('json');
            return $this->response;
        }
        // $this->Flash->error(__('The like could not be saved. Please, try again.'));
        $this->response = $this->response->withStringBody(json_encode(['success'=>false]));
        $this->response= $this->response->withType('json');
        return $this->response;

        
    }

    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            if ($this->Likes->save($like)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $users = $this->Likes->Users->find('list', ['limit' => 200])->all();
        $posts = $this->Likes->Posts->find('list', ['limit' => 200])->all();
        $this->set(compact('like', 'users', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($post = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $like = $this->Likes->get($post);

        $like = $this->Likes
            ->find()
            ->where(
                ['post_id' => $post], 
                ['user_id' => $this->request->getAttribute('identity')->id],
            )->first();
        ;

        if ($this->Likes->delete($like)) {
            // return $this->redirect(['controller'=>'Posts','action' => 'index']);
            $this->response = $this->response->withStringBody(json_encode(['success'=>true]));
            $this->response= $this->response->withType('json');
            return $this->response;
        }
        // $this->Flash->error(__('The like could not be saved. Please, try again.'));
        $this->response = $this->response->withStringBody(json_encode(['success'=>false]));
        $this->response= $this->response->withType('json');
        return $this->response;

        // if ($this->Likes->delete($like)) {
        // } else {
        //     $this->Flash->error(__('The like could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['controller' =>'Posts', 'action' => 'index']);
    }
}
