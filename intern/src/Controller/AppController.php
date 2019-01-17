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

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'userModel' => 'Angestellter'
                ]
            ],
            'loginAction' => [
                'controller' => 'Angestellter',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);
    }

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
            var month ="; echo json_encode($lastEightMonths, JSON_HEX_TAG);
        echo "</script>";

        /**
         * Query für laufende Projekte
         */
        $openProjectsCounts = $connection->execute('SELECT COUNT(projekt_id) FROM projekt WHERE abgeschlossen = 0')->fetchAll('assoc');
        $this->set('openProjectsCounts', reset($openProjectsCounts[0]));

        /**
         * Auftragsvolumen für einzelne Monate
         */
        for ($i = 0; $i < 8; $i++) {
            $monthForQuery = date("m", strtotime("-$i months"));
            $yearForQuery = date("Y", strtotime("-$i months"));
            $orderVolumeMonth = $connection->execute("SELECT SUM(arbeitspaket.kosten) FROM arbeitspaket WHERE (MONTH(hinzugefuegt_am) =$monthForQuery) AND (YEAR(hinzugefuegt_am) =$yearForQuery)")->fetchAll('assoc');
            $orderVolumeMonthFormatted = reset($orderVolumeMonth[0]);
            $this->set('orderVolumeMonth', $orderVolumeMonthFormatted);
            $orderVolume[] = $orderVolumeMonthFormatted;
        }
//
        /**
         * Array für Auftragsvolumen an JS übergeben
         */
        echo "
        <script>
            var orderVolume ="; echo json_encode($orderVolume, JSON_HEX_TAG); //Don't forget the extra semicolon!
        echo "</script>";
        $this->set('orderVolume', str_replace('.', ',', $orderVolume));

        /**
         * abgeschlossene Tasks für einzelne Monate
         */
        for ($i = 0; $i < 6; $i++) {
            $monthForQuery = date("m", strtotime("-$i months"));
            $yearForQuery = date("Y", strtotime("-$i months"));
            $finishedTasks = $connection->execute("SELECT COUNT(arbeitspaket.abgeschlossen_am) FROM arbeitspaket WHERE (MONTH(abgeschlossen_am) =$monthForQuery) AND (YEAR(abgeschlossen_am) =$yearForQuery)")->fetchAll('assoc');
            $finishedTaksFormatted = reset($finishedTasks[0]);
            $this->set('finishedTasks', $finishedTaksFormatted);
            $allFinishedTasks[] = $finishedTaksFormatted;
        }

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

    public function setLangToGerman() {
        I18n::setLocale('de_DE');
    }

    public function setLangToEnglish() {
        I18n::setLocale('en_US');
    }
}