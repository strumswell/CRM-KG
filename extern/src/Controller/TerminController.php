<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;


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

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Username & KDNr
         */
        $username = $this->request->getSession()->read('Auth.User')['username'];
        $kdnr = $this->request->getSession()->read('Auth.User')['kunde_id'];

        /**
         * Finished Tasks
         */
        $finishedTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt = 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.$kdnr)->fetchAll('assoc');
        $this->set('finishedTasksCount', reset($finishedTasksCount[0]));

        /**
         * Cost Of Current Projects
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.$kdnr)->fetchAll('assoc');
        $costFormatted = str_replace('.', ',', reset($cost[0]));
        $this->set('cost', $costFormatted);

        /**
         * Open Projects
         */
        $openProjectsCount = $connection->execute('SELECT COUNT(projekt_id) FROM projekt WHERE abgeschlossen = 0 AND kunde_id = '.$kdnr)->fetchAll('assoc');
        $this->set('openProjectsCount', reset($openProjectsCount[0]));

        /**
         * Open Tasks
         */
        $openTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.$kdnr)->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

        /**
         * Termine
         */
        $termin = $this->Termin->find()->where(['datum >=' => Time::now()]);
        $termin->matching('Projekt', function ($q) {
            $kdnr = $this->request->getSession()->read('Auth.User')['kunde_id'];
            return $q
                ->where(['Projekt.abgeschlossen' => 0])
                ->where(['Projekt.kunde_id' => $kdnr]);
        })->order(['Termin.datum' => 'ASC']);

        $termin = $this->paginate($termin);
        $this->set('termin', $termin);

        $angestelltertermin = $connection->execute('SELECT termin.termin_id, angestellter.angestellter_id, angestellter.vorname, angestellter.nachname, angestellter.username  FROM angestellter, termin, angestellter_termin WHERE angestellter_termin.termin_id = termin.termin_id AND angestellter_termin.angestellter_id = angestellter.angestellter_id')->fetchAll('assoc');
        $this->set('angestelltertermin', $angestelltertermin);
    }

    /**
     * View method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

    public function view($id = null)
    {
        $termin = $this->Termin->get($id, [
            'contain' => ['Projekt', 'Angestellter']
        ]);

        $this->set('termin', $termin);
    }
     * */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

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
     * */

    /**
     * Edit method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

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
     * */

    /**
     * Delete method
     *
     * @param string|null $id Termin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

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
    }*/
}
