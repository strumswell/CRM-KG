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
use Cake\Controller\Controller;
use Cake\I18n\Time;
use Cake\I18n\I18n;


/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ChatController extends AppController
{
    public function index() {
        /**
         * Username & KDNr
         */
        $angestellterid = $this->request->getSession()->read('Auth.User')['angestellter_id'];
        
        /**
         * DB Connection
         */
        $connection = ConnectionManager::get('default');

        /**
         * Open Meeting
         */

        $openMeetings = $connection->execute('SELECT termin.*,kunde.name from termin, projekt, kunde, angestellter_termin where termin.projekt_id = projekt.projekt_id and projekt.kunde_id = kunde.kunde_id AND angestellter_termin.termin_id = termin.termin_id AND angestellter_termin.angestellter_id = '.$angestellterid.' AND termin.datum >= CURRENT_TIMESTAMP ORDER BY termin.datum ASC LIMIT 3')->fetchAll('assoc');

        foreach ($openMeetings as $item) {
            $time = new Time($item['datum']);
            $time = $time->format('d.m.Y H:i');

            $openMeetingsDates[] = $time;
        }

        $this->set('openMeetingsDates', $openMeetingsDates);
        $this->set('openMeetings', $openMeetings);
    }
}