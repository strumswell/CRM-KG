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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;


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
        $username = $this->request->getSession()->read('Auth.User')['Username'];
        $kdnr = $connection->execute('SELECT KDNr FROM kunde WHERE Username = '.'"' . $username . '"')->fetchAll('assoc');
        $this->set('kdnr', reset($kdnr[0]));

        /**
         * Open Projects
         */
        $openprojects = $connection->execute('SELECT COUNT(ProjektID) FROM projekt WHERE Abgeschlossen = 0 AND KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('openprojects', reset($openprojects[0]));

        /**
         * Finished Tasks
         */
        $finishedtasks = $connection->execute('SELECT COUNT(TaskID) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt = 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('finishedtasks', reset($finishedtasks[0]));

        /**
         * Open Tasks
         */
        $opentasks = $connection->execute('SELECT COUNT(TaskID) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND arbeitspaket.Fortschritt < 100 AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('opentasks', reset($opentasks[0]));

        /**
         * Cost
         */
        $cost = $connection->execute('SELECT SUM(arbeitspaket.Kosten) FROM arbeitspaket, projekt WHERE arbeitspaket.ProjektID = projekt.ProjektID AND projekt.Abgeschlossen = 0 AND projekt.KDNr = '.reset($kdnr[0]))->fetchAll('assoc');
        $this->set('cost', reset($cost[0]));
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
