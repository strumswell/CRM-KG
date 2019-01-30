<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Controller;


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

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        $this->paginate = [
            'contain' => ['Projekt']
        ];

        $termin = $this->paginate($this->Termin);

        $this->set(compact('termin'));

        /**
         * Convert zustaendiger id to name
         */

        $zustaendige = $connection->execute('SELECT angestellter_id, vorname, nachname, username FROM angestellter')->fetchAll('assoc');
        $angestellterTermin = $connection->execute('SELECT angestellter_id, termin_id FROM angestellter_termin')->fetchAll('assoc');

        /**
         * Convert kunde id to name
         */

        $kundenliste = $connection->execute('SELECT kunde_id, username, name FROM kunde')->fetchAll('assoc');
        $this->set('kundenliste', $kundenliste);

        $this->set('zustaendige', $zustaendige);
        $this->set('angestellterTermin', $angestellterTermin);

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

        $this->set(compact('termin'));

        Controller::loadModel('Angestellter');


        $query = $this->Angestellter->find('list', [
            'keyField' => 'angestellter_id',
            'valueField' => 'username'
        ]);
        $this->set('users', $query);

        $projekt = $this->Termin->Projekt->find('list', [
            'keyField' => 'projekt_id',
            'valueField' => 'projektname'
        ]);
        $this->set('projekt', $projekt);


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
        Controller::loadModel('Angestellter');

        $query = $this->Angestellter->find('list', [
            'keyField' => 'angestellter_id',
            'valueField' => 'username'
        ]);
        $this->set('users', $query);

        $projekt = $this->Termin->Projekt->find('list', [
            'keyField' => 'projekt_id',
            'valueField' => 'projektname'
        ]);
        $this->set('projekt', $projekt);

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
        $angestellter = $this->Termin->Angestellter->find('list', ['limit' => 200])->toArray();
        $this->set(compact('termin', 'projekt', 'angestellter'));

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');
        $ange = $connection->execute('SELECT angestellter.angestellter_id FROM angestellter, angestellter_termin, termin WHERE angestellter.angestellter_id = angestellter_termin.angestellter_id AND angestellter_termin.termin_id = '.$termin->termin_id)->fetchAll('assoc');
        $this->set('ange', $ange[0]['angestellter_id']);
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
