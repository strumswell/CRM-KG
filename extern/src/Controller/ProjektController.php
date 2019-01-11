<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
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


        /**
         * Open Tasks
         */
        $openTasksCount = $connection->execute('SELECT COUNT(TaskID) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt < 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

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
        $projekt = $this->paginate($this->Projekt);

        $this->set(compact('projekt'));
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
        $projekt = $this->Projekt->newEntity();
        if ($this->request->is('post')) {
            $projekt = $this->Projekt->patchEntity($projekt, $this->request->getData());
            if ($this->Projekt->save($projekt)) {
                $this->Flash->success(__('The projekt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projekt could not be saved. Please, try again.'));
        }
        $this->set(compact('projekt'));
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
        $this->set(compact('projekt'));
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
}
