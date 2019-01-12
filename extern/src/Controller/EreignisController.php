<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Ereignis Controller
 *
 * @property \App\Model\Table\EreignisTable $Ereignis
 *
 * @method \App\Model\Entity\Ereigni[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EreignisController extends AppController
{
    function beforeRender(Event $event) {
        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Username & KDNr
         */
        $username = $this->request->getSession()->read('Auth.User')['Username'];
        $kdnr = $connection->execute('SELECT KDNr FROM kunde WHERE Username = '.'"' . $username . '"')->fetchAll('assoc');
        $this->set('kdnr', reset($kdnr[0]));

        /**
         * Open Projects
         */
        $openProjectsCount = $connection->execute('SELECT COUNT(ProjektID) FROM projekt WHERE Abgeschlossen = 0 AND KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openProjectsCount', reset($openProjectsCount[0]));

        /**
         * Finished Tasks
         */
        $finishedTasksCount = $connection->execute('SELECT COUNT(TaskID) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt = 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('finishedTasksCount', reset($finishedTasksCount[0]));

        $finishedTasks = $connection->execute('SELECT projekt.Projektname, arbeitspaket.Name, arbeitspaket.Kosten FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt = 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('finishedTasks', $finishedTasks);

        /**
         * Open Tasks
         */
        $openTasksCount = $connection->execute('SELECT COUNT(TaskID) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt < 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

        $openTasks = $connection->execute('SELECT projekt.Projektname, arbeitspaket.Name, arbeitspaket.Kosten, arbeitspaket.Fortschritt FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt < 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openTasks', $openTasks);

        /**
         * Cost Of Current Projects
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.Kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $costFormatted = str_replace('.', ',', reset($cost[0]));
        $this->set('cost', $costFormatted);
    }

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
