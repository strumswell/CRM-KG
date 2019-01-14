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
         * Array für aktuellen und vergangene Monate
         */
        $month = date("M");
        for ($i = 1; $i < 9; ++$i) {
            $lastEightMonths[] = $month;
            $month = date("M", strtotime("-$i months"));
        }
        echo "
        <script>
            var month ="; echo json_encode($lastEightMonths, JSON_HEX_TAG); //Don't forget the extra semicolon!
        echo "</script>";

        /**
         * Query für laufende Projekte
         */
        $openProjectsCounts = $connection->execute('SELECT COUNT(projekt_id) FROM projekt WHERE abgeschlossen = 0')->fetchAll('assoc');
        $this->set('openProjectsCounts', reset($openProjectsCounts[0]));


        /**
         * Query für aktuelles Auftragsvolumen
         */
        $monthForQuery = date("m");
        $yearForQuery = date("Y");
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -1
         */
        $monthForQuery = date("m", strtotime("-1 months"));
        $yearForQuery = date("Y", strtotime("-1 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -2
         */
        $monthForQuery = date("m", strtotime("-2 months"));
        $yearForQuery = date("Y", strtotime("-2 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -3
         */
        $monthForQuery = date("m", strtotime("-3 months"));
        $yearForQuery = date("Y", strtotime("-3 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -4
         */
        $monthForQuery = date("m", strtotime("-4 months"));
        $yearForQuery = date("Y", strtotime("-4 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -5
         */
        $monthForQuery = date("m", strtotime("-5 months"));
        $yearForQuery = date("Y", strtotime("-5 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -6
         */
        $monthForQuery = date("m", strtotime("-6 months"));
        $yearForQuery = date("Y", strtotime("-6 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Query für Monat -7
         */
        $monthForQuery = date("m", strtotime("-7 months"));
        $yearForQuery = date("Y", strtotime("-7 months"));
        $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
        $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
        $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
        $orderVolume[] = $orderVolumeMonthFormatted;

        /**
         * Array für Auftragsvolumen an JS übergeben
         */
        echo "
        <script>
            var orderVolume ="; echo json_encode($orderVolume, JSON_HEX_TAG); //Don't forget the extra semicolon!
        echo "</script>";
        $this->set('orderVolume', str_replace('.', ',', $orderVolume));
        /**
         * Query für abgeschlossene Tasks aktueller Monat
         */
        $monthForQuery = date("m");
        $yearForQuery = date("Y");
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;

        /**
         * Query für abgeschlossene Tasks Monat -1
         */
        $monthForQuery = date("m", strtotime("-1 months"));
        $yearForQuery = date("Y", strtotime("-1 months"));
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;

        /**
         * Query für abgeschlossene Tasks Monat -2
         */
        $monthForQuery = date("m", strtotime("-2 months"));
        $yearForQuery = date("Y", strtotime("-2 months"));
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;

        /**
         * Query für abgeschlossene Tasks Monat -3
         */
        $monthForQuery = date("m", strtotime("-3 months"));
        $yearForQuery = date("Y", strtotime("-3 months"));
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;

        /**
         * Query für abgeschlossene Tasks Monat -4
         */
        $monthForQuery = date("m", strtotime("-4 months"));
        $yearForQuery = date("Y", strtotime("-4 months"));
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;

        /**
         * Query für abgeschlossene Tasks Monat -5
         */
        $monthForQuery = date("m", strtotime("-5 months"));
        $yearForQuery = date("Y", strtotime("-5 months"));
        $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
        $finishedTaksFormatted = reset($finishedTasks[0]);
        $this->set('finishedTasks', $finishedTaksFormatted);
        $allFinishedTasks[] = $finishedTaksFormatted;
        /**
         * Array für Tasks an JS übergeben
         */
        echo "
        <script>
            var allFinishedTasks ="; echo json_encode($allFinishedTasks, JSON_HEX_TAG); //Don't forget the extra semicolon!
        echo "</script>";




        /**
         * Query für Nekunden seit Jahresbeginn
         */
        $actualYear = date("Y");
        $newCustomers = $connection->execute("SELECT COUNT(kunde.`registriert_am`) FROM kunde WHERE (YEAR(`registriert_am`) =$actualYear)")->fetchAll('assoc');
        $newCustomers = reset($newCustomers[0]);
        $this->set('newCustomers', $newCustomers);

        /**
         * Query für offene Tasks
         */
        $openTasks = $connection->execute("SELECT COUNT(arbeitspaket_id) FROM arbeitspaket, projekt WHERE arbeitspaket.projekt_id = projekt.projekt_id AND arbeitspaket.fortschritt < 100 AND projekt.abgeschlossen = 0")->fetchAll('assoc');
        $openTasks = reset($openTasks[0]);
        $this->set('openTasks', $openTasks);
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
                 return $this->redirect('/angestellter/login/');
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
