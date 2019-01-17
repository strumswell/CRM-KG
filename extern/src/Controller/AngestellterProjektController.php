<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AngestellterProjekt Controller
 *
 * @property \App\Model\Table\AngestellterProjektTable $AngestellterProjekt
 *
 * @method \App\Model\Entity\AngestellterProjekt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AngestellterProjektController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Angestellter', 'Projekt']
        ];
        $angestellterProjekt = $this->paginate($this->AngestellterProjekt);

        $this->set(compact('angestellterProjekt'));
    }

    /**
     * View method
     *
     * @param string|null $id Angestellter Projekt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $angestellterProjekt = $this->AngestellterProjekt->get($id, [
            'contain' => ['Angestellter', 'Projekt']
        ]);

        $this->set('angestellterProjekt', $angestellterProjekt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $angestellterProjekt = $this->AngestellterProjekt->newEntity();
        if ($this->request->is('post')) {
            $angestellterProjekt = $this->AngestellterProjekt->patchEntity($angestellterProjekt, $this->request->getData());
            if ($this->AngestellterProjekt->save($angestellterProjekt)) {
                $this->Flash->success(__('The angestellter projekt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter projekt could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterProjekt->Angestellter->find('list', ['limit' => 200]);
        $projekt = $this->AngestellterProjekt->Projekt->find('list', ['limit' => 200]);
        $this->set(compact('angestellterProjekt', 'angestellter', 'projekt'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Angestellter Projekt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $angestellterProjekt = $this->AngestellterProjekt->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $angestellterProjekt = $this->AngestellterProjekt->patchEntity($angestellterProjekt, $this->request->getData());
            if ($this->AngestellterProjekt->save($angestellterProjekt)) {
                $this->Flash->success(__('The angestellter projekt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter projekt could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterProjekt->Angestellter->find('list', ['limit' => 200]);
        $projekt = $this->AngestellterProjekt->Projekt->find('list', ['limit' => 200]);
        $this->set(compact('angestellterProjekt', 'angestellter', 'projekt'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Angestellter Projekt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $angestellterProjekt = $this->AngestellterProjekt->get($id);
        if ($this->AngestellterProjekt->delete($angestellterProjekt)) {
            $this->Flash->success(__('The angestellter projekt has been deleted.'));
        } else {
            $this->Flash->error(__('The angestellter projekt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
