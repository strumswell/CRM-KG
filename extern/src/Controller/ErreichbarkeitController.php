<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Erreichbarkeit Controller
 *
 * @property \App\Model\Table\ErreichbarkeitTable $Erreichbarkeit
 *
 * @method \App\Model\Entity\Erreichbarkeit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ErreichbarkeitController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Erreichbarkeits', 'Angestellter']
        ];
        $erreichbarkeit = $this->paginate($this->Erreichbarkeit);

        $this->set(compact('erreichbarkeit'));
    }

    /**
     * View method
     *
     * @param string|null $id Erreichbarkeit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $erreichbarkeit = $this->Erreichbarkeit->get($id, [
            'contain' => ['Erreichbarkeits', 'Angestellter']
        ]);

        $this->set('erreichbarkeit', $erreichbarkeit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $erreichbarkeit = $this->Erreichbarkeit->newEntity();
        if ($this->request->is('post')) {
            $erreichbarkeit = $this->Erreichbarkeit->patchEntity($erreichbarkeit, $this->request->getData());
            if ($this->Erreichbarkeit->save($erreichbarkeit)) {
                $this->Flash->success(__('The erreichbarkeit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The erreichbarkeit could not be saved. Please, try again.'));
        }
        $erreichbarkeits = $this->Erreichbarkeit->Erreichbarkeits->find('list', ['limit' => 200]);
        $angestellter = $this->Erreichbarkeit->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('erreichbarkeit', 'erreichbarkeits', 'angestellter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Erreichbarkeit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $erreichbarkeit = $this->Erreichbarkeit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $erreichbarkeit = $this->Erreichbarkeit->patchEntity($erreichbarkeit, $this->request->getData());
            if ($this->Erreichbarkeit->save($erreichbarkeit)) {
                $this->Flash->success(__('The erreichbarkeit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The erreichbarkeit could not be saved. Please, try again.'));
        }
        $erreichbarkeits = $this->Erreichbarkeit->Erreichbarkeits->find('list', ['limit' => 200]);
        $angestellter = $this->Erreichbarkeit->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('erreichbarkeit', 'erreichbarkeits', 'angestellter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Erreichbarkeit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $erreichbarkeit = $this->Erreichbarkeit->get($id);
        if ($this->Erreichbarkeit->delete($erreichbarkeit)) {
            $this->Flash->success(__('The erreichbarkeit has been deleted.'));
        } else {
            $this->Flash->error(__('The erreichbarkeit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
