<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Benutzer Controller
 *
 * @property \App\Model\Table\BenutzerTable $Benutzer
 *
 * @method \App\Model\Entity\Benutzer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BenutzerController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $benutzer = $this->paginate($this->Benutzer);

        $this->set(compact('benutzer'));
    }

    /**
     * View method
     *
     * @param string|null $id Benutzer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $benutzer = $this->Benutzer->get($id, [
            'contain' => []
        ]);

        $this->set('benutzer', $benutzer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $benutzer = $this->Benutzer->newEntity();
        if ($this->request->is('post')) {
            $benutzer = $this->Benutzer->patchEntity($benutzer, $this->request->getData());
            if ($this->Benutzer->save($benutzer)) {
                $this->Flash->success(__('The benutzer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The benutzer could not be saved. Please, try again.'));
        }
        $this->set(compact('benutzer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Benutzer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $benutzer = $this->Benutzer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $benutzer = $this->Benutzer->patchEntity($benutzer, $this->request->getData());
            if ($this->Benutzer->save($benutzer)) {
                $this->Flash->success(__('The benutzer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The benutzer could not be saved. Please, try again.'));
        }
        $this->set(compact('benutzer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Benutzer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $benutzer = $this->Benutzer->get($id);
        if ($this->Benutzer->delete($benutzer)) {
            $this->Flash->success(__('The benutzer has been deleted.'));
        } else {
            $this->Flash->error(__('The benutzer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $benutzer = $this->Auth->identify();
            if ($benutzer) {
                $this->Auth->setUser($benutzer);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
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
