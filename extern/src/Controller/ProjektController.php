<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;


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
        $this->paginate = [
            'contain' => ['Kunde']
        ];

        $projekt = TableRegistry::get('Projekt');

        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Username & KDNr
         */
        $username = $this->request->getSession()->read('Auth.User')['username'];
        $kdnr = $connection->execute('SELECT kunde_id FROM kunde WHERE username = '.'"' . $username . '"')->fetchAll('assoc');
        $kdnr = reset($kdnr[0]);

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
        $openTasksCount = $connection->execute('SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.$kdnr[0])->fetchAll('assoc');
        $this->set('openTasksCount', reset($openTasksCount[0]));

        /**
         * Projekt List
         */
        $query = $projekt->find()->where(['Projekt.kunde_id' => $kdnr])->order(['Projekt.hinzugefuegt_am' => 'DESC']);;

        $query = $this->paginate($query);

        $this->set('query', $query);

        $projekt = $this->Projekt;

        $this->set('projekt', $projekt);
    }


    /**
     * View method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

    public function view($id = null)
    {
        $projekt = $this->Projekt->get($id, [
            'contain' => ['Kunde', 'Angestellter']
        ]);

        $this->set('projekt', $projekt);
    }
     *  */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.

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
        $kunde = $this->Projekt->Kunde->find('list', ['limit' => 200]);
        $angestellter = $this->Projekt->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('projekt', 'kunde', 'angestellter'));
    }
     * */

    /**
     * Edit method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

    public function edit($id = null)
    {
        $projekt = $this->Projekt->get($id, [
            'contain' => ['Angestellter']
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
        $angestellter = $this->Projekt->Angestellter->find('list', ['limit' => 200]);
        $this->set(compact('projekt', 'kunde', 'angestellter'));
    }
     * */

    /**
     * Delete method
     *
     * @param string|null $id Projekt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

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
     *  */
}
