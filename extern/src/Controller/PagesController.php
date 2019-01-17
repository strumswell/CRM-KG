<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Entity\Projekt;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\View\Helper\Paginator;
use Cake\I18n\Time;
use Cake\I18n\I18n;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    function beforeRender(Event $event) {
        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Username & KDNr
         */
        $username = $this->request->getSession()->read('Auth.User')['username'];
        $kdnr = $connection->execute('SELECT kunde_id FROM kunde WHERE username = '.'"' . $username . '"')->fetchAll('assoc');
        $this->set('kdnr', reset($kdnr[0]));

        /**
         * Lade Projekt Model
         */
        Controller::loadModel('Projekt');
        Controller::loadModel('Arbeitspaket');


        /**
         * Open Tasks
        $openTasks = $this->Projekt->find()
        ->where(['Projekt.abgeschlossen' => 0])
        ->where(['Projekt.kunde_id' => reset($kdnr[0])]);
        $openTasks->matching('Arbeitspaket', function ($q) {
        return $q
        ->where(['Arbeitspaket.fortschritt <' => 100]);
        })->order(['Arbeitspaket.frist' => 'ASC']);

        $openTasks = $this->paginate($openTasks, ['scope' => 'openTasks']);
        $this->set('openTasks', $openTasks);
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
         * Open Tasks with deadline (card: Aufgabeübersicht)
         */

        $openTasksDeadline = $connection->execute('SELECT projekt.projektname, arbeitspaket.name, arbeitspaket.kosten, arbeitspaket.fortschritt, arbeitspaket.frist FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '. reset($kdnr[0]) .' AND arbeitspaket.frist >= CURRENT_TIMESTAMP ORDER BY frist ASC LIMIT 3;')->fetchAll('assoc');
        $this->set('openTasksDeadline', $openTasksDeadline);

        foreach ($openTasksDeadline as $item) {
            $time = new Time($item['frist']);
            $time = $time->format('d-m-Y');

            $openTasksDeadlineDates[] = str_replace('-', '.', $time);
        }

        $this->set('openTasksDeadlineDates', $openTasksDeadlineDates);

        /**
         * Open Meeting
         */

        $openMeetings = $connection->execute('SELECT termin.* from termin, projekt, kunde where termin.projekt_id = projekt.projekt_id and projekt.kunde_id = kunde.kunde_id and projekt.kunde_id = '. reset($kdnr[0]) .' AND termin.datum >= CURRENT_TIMESTAMP ORDER BY termin.datum ASC LIMIT 3;')->fetchAll('assoc');
        foreach ($openMeetings as $item) {
            $time = new Time($item['datum']);
            $time = $time->format('d-m-Y');

            $openMeetingsDates[] = str_replace('-', '.', $time);
        }

        $this->set('openMeetingsDates', $openMeetingsDates);
        $this->set('openMeetings', $openMeetings);

        //I18n::setLocale('de_DE');



        /**
         * Cost Of Current Projects
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND projekt.abgeschlossen = 0 AND projekt.kunde_id = '.reset($kdnr[0]))->fetchAll('assoc');
        $costFormatted = str_replace('.', ',', reset($cost[0]));
        $this->set('cost', $costFormatted);
    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        /**
         * Prüfen, ob der Nutzer eingeloggt ist beim aufrufen der home.ctp (Dashboard)
         */
        $user = $this->Auth->user();
        if (!isset($user)) {
            return $this->redirect('/kunde/login/');
        }

        /**
         * Generierter Inhalt
         */
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('projekt'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
