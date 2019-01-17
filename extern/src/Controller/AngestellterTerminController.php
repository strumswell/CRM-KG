<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AngestellterTermin Controller
 *
 * @property \App\Model\Table\AngestellterTerminTable $AngestellterTermin
 *
 * @method \App\Model\Entity\AngestellterTermin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AngestellterTerminController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Angestellter', 'Termin']
        ];
        $angestellterTermin = $this->paginate($this->AngestellterTermin);

        $this->set(compact('angestellterTermin'));
    }

    /**
     * View method
     *
     * @param string|null $id Angestellter Termin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $angestellterTermin = $this->AngestellterTermin->get($id, [
            'contain' => ['Angestellter', 'Termin']
        ]);

        $this->set('angestellterTermin', $angestellterTermin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $angestellterTermin = $this->AngestellterTermin->newEntity();
        if ($this->request->is('post')) {
            $angestellterTermin = $this->AngestellterTermin->patchEntity($angestellterTermin, $this->request->getData());
            if ($this->AngestellterTermin->save($angestellterTermin)) {
                $this->Flash->success(__('The angestellter termin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter termin could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterTermin->Angestellter->find('list', ['limit' => 200]);
        $termin = $this->AngestellterTermin->Termin->find('list', ['limit' => 200]);
        $this->set(compact('angestellterTermin', 'angestellter', 'termin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Angestellter Termin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $angestellterTermin = $this->AngestellterTermin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $angestellterTermin = $this->AngestellterTermin->patchEntity($angestellterTermin, $this->request->getData());
            if ($this->AngestellterTermin->save($angestellterTermin)) {
                $this->Flash->success(__('The angestellter termin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter termin could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterTermin->Angestellter->find('list', ['limit' => 200]);
        $termin = $this->AngestellterTermin->Termin->find('list', ['limit' => 200]);
        $this->set(compact('angestellterTermin', 'angestellter', 'termin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Angestellter Termin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $angestellterTermin = $this->AngestellterTermin->get($id);
        if ($this->AngestellterTermin->delete($angestellterTermin)) {
            $this->Flash->success(__('The angestellter termin has been deleted.'));
        } else {
            $this->Flash->error(__('The angestellter termin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
