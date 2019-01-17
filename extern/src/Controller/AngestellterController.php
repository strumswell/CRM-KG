<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Controller\Controller;


/**
 * Angestellter Controller
 *
 * @property \App\Model\Table\AngestellterTable $Angestellter
 *
 * @method \App\Model\Entity\Angestellter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AngestellterController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $angestellter = $this->paginate($this->Angestellter);

        $this->set(compact('angestellter'));
    }

    /**
     * View method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $angestellter = $this->Angestellter->get($id, [
            'contain' => ['Arbeitspaket', 'Projekt', 'Termin']
        ]);

        $this->set('angestellter', $angestellter);

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');
        Controller::loadModel('Projekt');
        Controller::loadModel('Arbeitspaket');

        /**
         * Username & KDNr
         */
        $username = $this->request->getSession()->read('Auth.User')['username'];
        $kdnr = $connection->execute('SELECT kunde_id FROM kunde WHERE username = '.'"' . $username . '"')->fetchAll('assoc');

        /**
         * Erreichbarkeit
         */
        $erreichbarkeit = $connection->execute('SELECT * FROM erreichbarkeit WHERE angestellter_id = '.'"' . $id . '"')->fetchAll('assoc');
        $this->set('erreichbarkeit', $erreichbarkeit);

        /**
         * Open Tasks
         */

        $openTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

        /**
         * Finished Tasks
         */
        $finishedTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt = 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('finishedTasksCount', reset($finishedTasksCount[0]));

        $finishedTasks = $this->Projekt->find()
            ->where(['Projekt.abgeschlossen' => 0])
            ->where(['Projekt.kunde_id' => reset($kdnr[0])]);
        $finishedTasks->matching('Arbeitspaket', function ($q) {
            return $q
                ->where(['Arbeitspaket.fortschritt' => 100]);
        })->order(['Arbeitspaket.abgeschlossen_am' => 'DESC']);

        $finishedTasks = $this->paginate($finishedTasks);
        $this->set('finishedTasks', $finishedTasks);

        /**
         * Open Projects
         */
        $openProjectsCount = $connection->execute('SELECT COUNT(projekt_id) FROM projekt WHERE abgeschlossen = 0 AND kunde_id = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openProjectsCount', reset($openProjectsCount[0]));

        /**
         * Cost Of Current Projects
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.reset($kdnr[0]))->fetchAll('assoc');
        $costFormatted = str_replace('.', ',', reset($cost[0]));
        $this->set('cost', $costFormatted);


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $angestellter = $this->Angestellter->newEntity();
        if ($this->request->is('post')) {
            $angestellter = $this->Angestellter->patchEntity($angestellter, $this->request->getData());
            if ($this->Angestellter->save($angestellter)) {
                $this->Flash->success(__('The angestellter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter could not be saved. Please, try again.'));
        }
        $arbeitspaket = $this->Angestellter->Arbeitspaket->find('list', ['limit' => 200]);
        $projekt = $this->Angestellter->Projekt->find('list', ['limit' => 200]);
        $termin = $this->Angestellter->Termin->find('list', ['limit' => 200]);
        $this->set(compact('angestellter', 'arbeitspaket', 'projekt', 'termin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $angestellter = $this->Angestellter->get($id, [
            'contain' => ['Arbeitspaket', 'Projekt', 'Termin']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $angestellter = $this->Angestellter->patchEntity($angestellter, $this->request->getData());
            if ($this->Angestellter->save($angestellter)) {
                $this->Flash->success(__('The angestellter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The angestellter could not be saved. Please, try again.'));
        }
        $arbeitspaket = $this->Angestellter->Arbeitspaket->find('list', ['limit' => 200]);
        $projekt = $this->Angestellter->Projekt->find('list', ['limit' => 200]);
        $termin = $this->Angestellter->Termin->find('list', ['limit' => 200]);
        $this->set(compact('angestellter', 'arbeitspaket', 'projekt', 'termin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Angestellter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $angestellter = $this->Angestellter->get($id);
        if ($this->Angestellter->delete($angestellter)) {
            $this->Flash->success(__('The angestellter has been deleted.'));
        } else {
            $this->Flash->error(__('The angestellter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
