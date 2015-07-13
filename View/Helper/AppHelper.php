<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

	public function isVip($vip) {
		if($vip) {
			return 'Sim';
		}
		else {
			return 'Não';
		}
	}

	public function ifVip($vip) {
		if($vip) {
			return '(VIP)';
		}
	}

	public function formatDate($date) {
		$date = new DateTime($date);
		return date_format($date, 'd/m/Y - H:i');
	}

	public function ticketOwner($owner) {
		if($owner == null) {
			return 'Disponível';
		}
		else return $owner;
	}

	public function priceFormat($value) {
		return 'R$ ' . $value;
	}

	public function totalFundsEvent($eventId) {
		// $soldTickets = $this->Ticket->find('all', 
		// 	array(
		// 		'conditions' => array(
		// 			'Ticket.event_id' => $eventId,
		// 			'Ticket.user_id !=' => null
		// 		),
		// 		'fields' => array('sum(Ticket.price) as totalSoldTickets')
		// 	)
		// );

		

		return $soldTickets;


	}

	public function isAdmin($currentUser) {
		if ($currentUser['role'] == 'admin') return true;
		else return false;
	}
}
