<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kunde Controller
 *
 * @property \App\Model\Table\KundeTable $Kunde
 *
 * @method \App\Model\Entity\Kunde[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KundeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $kunde = $this->paginate($this->Kunde);

        $this->set(compact('kunde'));
    }

    /**
     * View method
     *
     * @param string|null $id Kunde id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kunde = $this->Kunde->get($id, [
            'contain' => []
        ]);

        $this->set('kunde', $kunde);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kunde = $this->Kunde->newEntity();
        if ($this->request->is('post')) {
            $kunde = $this->Kunde->patchEntity($kunde, $this->request->getData());
            if ($this->Kunde->save($kunde)) {
                $this->Flash->success(__('The kunde has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kunde could not be saved. Please, try again.'));
        }
        $this->set(compact('kunde'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kunde id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kunde = $this->Kunde->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kunde = $this->Kunde->patchEntity($kunde, $this->request->getData());
            if ($this->Kunde->save($kunde)) {
                $this->Flash->success(__('The kunde has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kunde could not be saved. Please, try again.'));
        }
        $this->set(compact('kunde'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kunde id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kunde = $this->Kunde->get($id);
        if ($this->Kunde->delete($kunde)) {
            $this->Flash->success(__('The kunde has been deleted.'));
        } else {
            $this->Flash->error(__('The kunde could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $kunde = $this->Auth->identify();
            if ($kunde) {
                $this->Auth->setUser($kunde);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.dd');
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
