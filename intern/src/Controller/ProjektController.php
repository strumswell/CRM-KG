<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;


/**
 * Projekt Controller
 *
 * @property \App\Model\Table\ProjektTable $Projekt
 *
 * @method \App\Model\Entity\Projekt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjektController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $projekt = $this->paginate($this->Projekt);

        $this->paginate = [
            'contain' => ['Kunde']
        ];

        $this->set('projekt', $projekt);

        /**
         * Convert zustaendiger id to name
         */

        $kunden = $connection->execute('SELECT kunde_id, name FROM kunde')->fetchAll('assoc');
        $this->set('kunden', $kunden);

        /**
         * Open Task List
         */
        $openProjekt = $this->Projekt->find()
            ->where(['Projekt.abgeschlossen' => 0])->order(['Projekt.hinzugefuegt_am' => 'ASC']);

        $openProjekt = $this->paginate($openProjekt);

        $this->set('openProjekt', $openProjekt);

    }

    /**
     * View method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projekt = $this->Projekt->get($id, [
            'contain' => []
        ]);

        $this->set('projekt', $projekt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $connection = ConnectionManager::get('default');
        $projekt = $this->Projekt->newEntity();

        if ($this->request->is('post')) {
            $projekt = $this->Projekt->patchEntity($projekt, $this->request->getData());
            if ($this->Projekt->save($projekt)) {
                $this->Flash->success(__('The projekt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projekt could not be saved. Please, try again.'));
        }

        /**
         * Convert zustaendiger id to name
         */

        $kunde = $this->Projekt->Kunde->find('list', ['limit' => 200]);
        $this->set(compact('projekt', 'kunde'));


    }

    /**
     * Edit method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projekt = $this->Projekt->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projekt = $this->Projekt->patchEntity($projekt, $this->request->getData());
            if ($this->Projekt->save($projekt)) {
                $this->Flash->success(__('The projekt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projekt could not be saved. Please, try again.'));
        }
        $kunde = $this->Projekt->Kunde->find('list', ['limit' => 200]);
        $this->set(compact('projekt', 'kunde'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projekt = $this->Projekt->get($id);
        if ($this->Projekt->delete($projekt)) {
            $this->Flash->success(__('The projekt has been deleted.'));
        } else {
            $this->Flash->error(__('The projekt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function finish($id = null) {
        $tabelle = TableRegistry::get('Projekt');
        $this->Projekt = $tabelle->get($id);

        $this->Projekt->abgeschlossen = 1;
        $tabelle->save($this->Projekt);

        $this->Flash->success(__('The projekt has been saved.'));
        $this->redirect(['action' => 'index']);

        $this->autoRender = false;
    }
}
