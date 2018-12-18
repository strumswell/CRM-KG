<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Arbeitspaket Controller
 *
 * @property \App\Model\Table\ArbeitspaketTable $Arbeitspaket
 *
 * @method \App\Model\Entity\Arbeitspaket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArbeitspaketController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $arbeitspaket = $this->paginate($this->Arbeitspaket);

        $this->set(compact('arbeitspaket'));
    }

    /**
     * View method
     *
     * @param string|null $id Arbeitspaket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $arbeitspaket = $this->Arbeitspaket->get($id, [
            'contain' => []
        ]);

        $this->set('arbeitspaket', $arbeitspaket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $arbeitspaket = $this->Arbeitspaket->newEntity();
        if ($this->request->is('post')) {
            $arbeitspaket = $this->Arbeitspaket->patchEntity($arbeitspaket, $this->request->getData());
            if ($this->Arbeitspaket->save($arbeitspaket)) {
                $this->Flash->success(__('The arbeitspaket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arbeitspaket could not be saved. Please, try again.'));
        }
        $this->set(compact('arbeitspaket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Arbeitspaket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $arbeitspaket = $this->Arbeitspaket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $arbeitspaket = $this->Arbeitspaket->patchEntity($arbeitspaket, $this->request->getData());
            if ($this->Arbeitspaket->save($arbeitspaket)) {
                $this->Flash->success(__('The arbeitspaket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arbeitspaket could not be saved. Please, try again.'));
        }
        $this->set(compact('arbeitspaket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Arbeitspaket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $arbeitspaket = $this->Arbeitspaket->get($id);
        if ($this->Arbeitspaket->delete($arbeitspaket)) {
            $this->Flash->success(__('The arbeitspaket has been deleted.'));
        } else {
            $this->Flash->error(__('The arbeitspaket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
