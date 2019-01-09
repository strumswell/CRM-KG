<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ereignis Controller
 *
 * @property \App\Model\Table\EreignisTable $Ereignis
 *
 * @method \App\Model\Entity\Ereigni[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EreignisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ereignis = $this->paginate($this->Ereignis);

        $this->set(compact('ereignis'));
    }

    /**
     * View method
     *
     * @param string|null $id Ereigni id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ereigni = $this->Ereignis->get($id, [
            'contain' => []
        ]);

        $this->set('ereigni', $ereigni);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ereigni = $this->Ereignis->newEntity();
        if ($this->request->is('post')) {
            $ereigni = $this->Ereignis->patchEntity($ereigni, $this->request->getData());
            if ($this->Ereignis->save($ereigni)) {
                $this->Flash->success(__('The ereigni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ereigni could not be saved. Please, try again.'));
        }
        $this->set(compact('ereigni'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ereigni id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ereigni = $this->Ereignis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ereigni = $this->Ereignis->patchEntity($ereigni, $this->request->getData());
            if ($this->Ereignis->save($ereigni)) {
                $this->Flash->success(__('The ereigni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ereigni could not be saved. Please, try again.'));
        }
        $this->set(compact('ereigni'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ereigni id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ereigni = $this->Ereignis->get($id);
        if ($this->Ereignis->delete($ereigni)) {
            $this->Flash->success(__('The ereigni has been deleted.'));
        } else {
            $this->Flash->error(__('The ereigni could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
