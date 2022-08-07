<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
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
        // $messages = $this->paginate($this->Messages);

        // $this->set(compact('messages'));

        $messages = $this->paginate(
            $this->Messages
            ->find()
            ->contain(['Receivers', 'Senders'])
            ->where([
                'OR' => [
                    ['Receivers.id' =>  $this->request->getAttribute('identity')->id],
                    ['Senders.id' =>  $this->request->getAttribute('identity')->id]
                ]
            ])) ;
        ;

        $list = [];
        $list2 = [];
        $tmpList;

        // foreach ($messages as $u) {
        //     $tmpList = $u;
        //     foreach ($messages as $m) {
        //         if($tmpList->receiver_id === $m->sender_id || $tmpList->sender_id === $m->receiver_id) {
        //             $list[] = $m;
        //         } 
        //     }
        // }

        //regarde avce attribut id user connecté
        $found = false;
        foreach ($messages as $u) {
            $tmpList = $u;
            foreach ($messages as $m) {
                if($tmpList->receiver_id === $this->request->getAttribute('identity')->id || $tmpList->sender_id === $this->request->getAttribute('identity')->id) {
                    $list[] = $m;
                    
                } 
               
            }


            // for ($i = 0; $i <= count($list) && !$found ; $i++) {
            //     if($i === count($list)) {
            //         $found = true;
            //     }
            //         if($list[$i]->receiver_id === $list[$i++]->receiver_id || $list[$i]->sender_id === $list[$i++]->sender_id) {
            //             $list2[] = $list[$i];
            //         }
                
            // }
            foreach ($list as $l) {
                if($l->receiver_id === $this->request->getAttribute('identity')->id || $l->sender_id === $this->request->getAttribute('identity')->id) {
                    $list2[] = $l;
                }
            }
        }

        $this->set(compact('messages', 'list2'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Receivers', 'Senders'],
        ]);

        $this->set(compact('message'));
    }

       /**
     * Conversation method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function conversation()
    {
        $message = $this->Messages->Receivers
            ->find()
            ->where(['Receivers.id !=' => $this->request->getAttribute('identity')->id]);

            // ->contain(['Messages' => function ($q) {
            //     return $q->where(['Messages.receiver_id' => $this->request->getAttribute('identity')->id]);
            // }]);
            ;


        // $this->set(compact('message'));
        $this->set(['message' => $message]);

    }
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id_user)
    {
        if($id_user == $this->request->getAttribute('identity')->id) {
            $this->Flash->error(__("Tu ne peux pas t'envoyer un message"));
            return $this->redirect(['action' => 'index']);
        }

        $this->loadModel('Users');
        $user = $this->Users->get($id_user, [
            'contain' => [],
        ]);

        $conv = $this->paginate(
            $this->Messages
            ->find()
            ->contain(['Receivers', 'Senders'])
            ->where([
                'OR' => [
                    ['Receivers.id' =>  $id_user],
                    ['Senders.id' =>  $id_user]
                ]
            ])) ;
        ;

        $message = $this->Messages->newEmptyEntity();
        $message->set(['sender_id'=>$this->request->getAttribute('identity')->id]);
        $message->set(['receiver_id'=>$id_user]);

        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {

                return $this->redirect(['action' => 'add', $id_user]);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        // $users = $this->Messages->Receivers
        //     ->find()
        //     ->where(['Receivers.id !=' => $this->request->getAttribute('identity')->id]);
        
        // $userList = [];
        // foreach ($users as $u) {
        //     $userList[$u->id] = $u->pseudo;
        // }

        $this->set(compact('message', 'conv', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $users = $this->Messages->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('message', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
