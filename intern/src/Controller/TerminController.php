<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Termin Controller
 *
 * @property \App\Model\Table\TerminTable $Termin
 *
 * @method \App\Model\Entity\Termin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TerminController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projekt']
        ];
        $termin = $this->paginate($this->Termin);

        $this->set(compact('termin'));
    }

    /**
     * View method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $termin = $this->Termin->get($id, [
            'contain' => ['Projekt', 'Angestellter']
        ]);

        $this->set('termin', $termin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $termin = $this->Termin->newEntity();
        if ($this->request->is('post')) {
            $termin = $this->Termin->patchEntity($termin, $this->request->getData());
            if ($this->Termin->save($termin)) {
                $this->Flash->success(__('The termin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The termin could not be saved. Please, try again.'));
        }
        $projekt = $this->Termin->Projekt->find('list', ['limit' => 200]);
        $angestellter = $this->Termin->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('termin', 'projekt', 'angestellter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $termin = $this->Termin->get($id, [
            'contain' => ['Angestellter']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $termin = $this->Termin->patchEntity($termin, $this->request->getData());
            if ($this->Termin->save($termin)) {
                $this->Flash->success(__('The termin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The termin could not be saved. Please, try again.'));
        }
        $projekt = $this->Termin->Projekt->find('list', ['limit' => 200]);
        $angestellter = $this->Termin->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('termin', 'projekt', 'angestellter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $termin = $this->Termin->get($id);
        if ($this->Termin->delete($termin)) {
            $this->Flash->success(__('The termin has been deleted.'));
        } else {
            $this->Flash->error(__('The termin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
