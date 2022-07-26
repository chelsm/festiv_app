<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);

    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /articles après la connexion réussie
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Likes', 'Posts'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout()
    {
        $log = $this->Authentication->getResult();
        if($log->isValid()){
            $this->Authentication->logout();
            $this->Flash->success('See you soon');
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function picture($id){
		if($this->request->getAttribute('identity') == null || empty($id)) {
			$this->Flash->error('Action interdite');
			return $this->redirect(['controller' => 'Users','action' => 'index']);
		}


		$a = $this->Users->get($id);

		//si on arecu le form
		if($this->request->is(['post', 'put'])){

			//si le fichier est vide ou qu'il n'est pas au bon format
			if(empty($this->request->getData('image')->getClientFilename()) || !in_array($this->request->getData('image')->getClientMediaType(), ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])){
				//message d'erreur
				$this->Flash->error('L\'image est obligatoire et doit être au format png, jpg ou gif');

			}else{ //sinon

				//on recup l'extention
				$ext = pathinfo($this->request->getData('image')->getClientFilename(), PATHINFO_EXTENSION);

				//on cree le nouveau nom
				$name = 'user-'.$id.'-'.time().'.'.$ext;

				//on sauve l'ancien nom
				$oldname = $a->photo;

				//on place ce nouveau nom dans l'entité (dans la colonne 'picture')
				$a->photo = $name;

				//on sauvegarde l'entité
				if($this->Users->save($a)){

					//si l'ancien fichier existe, on le supprime
					if(!empty($oldname) && file_exists(WWW_ROOT.'img/profils/'.$oldname)){
						unlink(WWW_ROOT.'img/profils/'.$oldname);
					}

					//on déplace le fichier
					$this->request->getData('image')->moveTo(WWW_ROOT.'img/profils/'.$name);

					//message success
					$this->Flash->success('Image ajoutée');

					//redirection vers fiche artiste
					return $this->redirect(['action' => 'view', $id]);
				}
				$this->Flash->error('Sauvegarde impossible');
			}//fin sinon
		}
		$this->set(compact('a'));

	}
}
