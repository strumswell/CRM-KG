<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Angestellter Controller
 *
 * @property \App\Model\Table\AngestellterTable $Angestellter
 *
 * @method \App\Model\Entity\Angestellter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AngestellterController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $angestellter = $this->paginate($this->Angestellter);

        $this->set(compact('angestellter'));
    }

    /**
     * View method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $angestellter = $this->Angestellter->get($id, [
            'contain' => ['Arbeitspaket', 'Termin', 'Projekt']
        ]);

        $this->set('angestellter', $angestellter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $angestellter = $this->Angestellter->newEntity();
        if ($this->request->is('post')) {
            $angestellter = $this->Angestellter->patchEntity($angestellter, $this->request->getData());
            if ($this->Angestellter->save($angestellter)) {
                $this->Flash->success(__('The angestellter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter could not be saved. Please, try again.'));
        }
        $arbeitspaket = $this->Angestellter->Arbeitspaket->find('list', ['limit' => 200]);
        $termin = $this->Angestellter->Termin->find('list', ['limit' => 200]);
        $projekt = $this->Angestellter->Projekt->find('list', ['limit' => 200]);
        $this->set(compact('angestellter', 'arbeitspaket', 'termin', 'projekt'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $angestellter = $this->Angestellter->get($id, [
            'contain' => ['Arbeitspaket', 'Termin', 'Projekt']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $angestellter = $this->Angestellter->patchEntity($angestellter, $this->request->getData());
            if ($this->Angestellter->save($angestellter)) {
                $this->Flash->success(__('The angestellter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter could not be saved. Please, try again.'));
        }
        $arbeitspaket = $this->Angestellter->Arbeitspaket->find('list', ['limit' => 200]);
        $termin = $this->Angestellter->Termin->find('list', ['limit' => 200]);
        $projekt = $this->Angestellter->Projekt->find('list', ['limit' => 200]);
        $this->set(compact('angestellter', 'arbeitspaket', 'termin', 'projekt'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $angestellter = $this->Angestellter->get($id);
        if ($this->Angestellter->delete($angestellter)) {
            $this->Flash->success(__('The angestellter has been deleted.'));
        } else {
            $this->Flash->error(__('The angestellter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }


    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
