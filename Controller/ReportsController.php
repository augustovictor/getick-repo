<?php 
App::uses('AppController', 'Controller');

class ReportsController extends AppController {
	public function events_report() {
		$this->loadModel('Event');

		// $this->Ticket->virtualFields['totalFunds'] = 'SUM(Ticket.price)';
		// $this->set('soldTicketsTotal', $this->Ticket->find('all', array('fields' => array('totalFunds'))));
	}	

	public function tickets_report() {
		$this->loadModel('Ticket');
		$this->set('tickets', $this->Ticket->find('all'));
	}	

	public function users_report() {
		$this->loadModel('User');
		$this->set('users', $this->User->find('all'));
	}	
}

