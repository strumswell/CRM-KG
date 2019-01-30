<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;


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
        $projekt = TableRegistry::get('Projekt');
        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');


        /**
         * Finished Tasks
         */
        $finishedTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt = 100 AND projekt.abgeschlossen = 0')->fetchAll('assoc');
        $this->set('finishedTasksCount', reset($finishedTasksCount[0]));

        /**
         * Cost Of Current Projects
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND projekt.abgeschlossen = 0')->fetchAll('assoc');
        $costFormatted = str_replace('.', ',', reset($cost[0]));
        $this->set('cost', $costFormatted);

        /**
         * Open Projects
         */
        $openProjectsCount = $connection->execute('SELECT COUNT(projekt_id) FROM projekt WHERE abgeschlossen = 0')->fetchAll('assoc');
        $this->set('openProjectsCount', reset($openProjectsCount[0]));

        /**
         * Open Tasks
         */
        $openTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0')->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

        /**
         * Convert zustaendiger id to name
         */

        $zustaendige = $connection->execute('SELECT angestellter_id, vorname, nachname, username FROM angestellter')->fetchAll('assoc');
        $this->set('zustaendige', $zustaendige);

        /**
         * Convert kunde id to name
         */

        $kundenliste = $connection->execute('SELECT kunde_id, username, name FROM kunde')->fetchAll('assoc');
        $this->set('kundenliste', $kundenliste);

        /**
         * Open Task List
         */
        $openTasksArbeitspaket = $projekt->find()
            ->where(['Projekt.abgeschlossen' => 0]);
        $openTasksArbeitspaket->matching('Arbeitspaket', function ($q) {
            return $q
                ->where(['Arbeitspaket.fortschritt <' => 100]);
        })->order(['Arbeitspaket.frist' => 'ASC']);

        $openTasksArbeitspaket = $this->paginate($openTasksArbeitspaket);

        $this->set('openTasksArbeitspaket', $openTasksArbeitspaket);
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
        Controller::loadModel('Angestellter');
        Controller::loadModel('Projekt');

        $query = $this->Angestellter->find('list', [
            'keyField' => 'angestellter_id',
            'valueField' => 'username'
        ]);
        $users = $query->toArray();
        $this->set('users', $users);

        $query = $this->Projekt->find('list', [
            'keyField' => 'projekt_id',
            'valueField' => 'projektname'
        ])->where(['abgeschlossen'=>0]);
        $projekte = $query->toArray();
        $this->set('projekte', $projekte);

        $arbeitspaket = $this->Arbeitspaket->newEntity();
        if ($this->request->is('post')) {
            print_r($this->request->getData());
            $arbeitspaket = $this->Arbeitspaket->patchEntity($arbeitspaket, $this->request->getData());
            if ($this->Arbeitspaket->save($arbeitspaket)) {
                $this->Flash->success(__('The arbeitspaket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //print_r($this->request->getData());

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

        Controller::loadModel('Angestellter');

        $query = $this->Angestellter->find('list', [
            'keyField' => 'angestellter_id',
            'valueField' => 'username'
        ]);
        $users = $query->toArray();
        $this->set('users', $users);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $arbeitspaket = $this->Arbeitspaket->patchEntity($arbeitspaket, $this->request->getData());
            if ($this->Arbeitspaket->save($arbeitspaket)) {
                $this->Flash->success(__('The arbeitspaket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arbeitspaket could not be saved. Please, try again.'));
        }
        $this->set(compact('arbeitspaket'));

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Convert zustaendiger id to name
         */

        $zustaendige = $connection->execute('SELECT angestellter_id, vorname, nachname, username FROM angestellter')->fetchAll('assoc');
        $this->set('zustaendige', $zustaendige);
    }

    public function finish($id = null) {
        $tabelle = TableRegistry::get('Arbeitspaket');
        $arbeitspaket = $tabelle->get($id);

        $arbeitspaket->fortschritt = 100;
        $tabelle->save($arbeitspaket);

        $this->Flash->success(__('The arbeitspaket has been saved.'));
        $this->redirect(['action' => 'index']);

        $this->autoRender = false;
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
