<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AngestellterArbeitspaket Controller
 *
 * @property \App\Model\Table\AngestellterArbeitspaketTable $AngestellterArbeitspaket
 *
 * @method \App\Model\Entity\AngestellterArbeitspaket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AngestellterArbeitspaketController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Angestellter', 'Arbeitspaket']
        ];
        $angestellterArbeitspaket = $this->paginate($this->AngestellterArbeitspaket);

        $this->set(compact('angestellterArbeitspaket'));
    }

    /**
     * View method
     *
     * @param string|null $id Angestellter Arbeitspaket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $angestellterArbeitspaket = $this->AngestellterArbeitspaket->get($id, [
            'contain' => ['Angestellter', 'Arbeitspaket']
        ]);

        $this->set('angestellterArbeitspaket', $angestellterArbeitspaket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $angestellterArbeitspaket = $this->AngestellterArbeitspaket->newEntity();
        if ($this->request->is('post')) {
            $angestellterArbeitspaket = $this->AngestellterArbeitspaket->patchEntity($angestellterArbeitspaket, $this->request->getData());
            if ($this->AngestellterArbeitspaket->save($angestellterArbeitspaket)) {
                $this->Flash->success(__('The angestellter arbeitspaket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter arbeitspaket could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterArbeitspaket->Angestellter->find('list', ['limit' => 200]);
        $arbeitspaket = $this->AngestellterArbeitspaket->Arbeitspaket->find('list', ['limit' => 200]);
        $this->set(compact('angestellterArbeitspaket', 'angestellter', 'arbeitspaket'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Angestellter Arbeitspaket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $angestellterArbeitspaket = $this->AngestellterArbeitspaket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $angestellterArbeitspaket = $this->AngestellterArbeitspaket->patchEntity($angestellterArbeitspaket, $this->request->getData());
            if ($this->AngestellterArbeitspaket->save($angestellterArbeitspaket)) {
                $this->Flash->success(__('The angestellter arbeitspaket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter arbeitspaket could not be saved. Please, try again.'));
        }
        $angestellter = $this->AngestellterArbeitspaket->Angestellter->find('list', ['limit' => 200]);
        $arbeitspaket = $this->AngestellterArbeitspaket->Arbeitspaket->find('list', ['limit' => 200]);
        $this->set(compact('angestellterArbeitspaket', 'angestellter', 'arbeitspaket'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Angestellter Arbeitspaket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $angestellterArbeitspaket = $this->AngestellterArbeitspaket->get($id);
        if ($this->AngestellterArbeitspaket->delete($angestellterArbeitspaket)) {
            $this->Flash->success(__('The angestellter arbeitspaket has been deleted.'));
        } else {
            $this->Flash->error(__('The angestellter arbeitspaket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
