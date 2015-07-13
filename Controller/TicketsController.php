<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TicketsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */

	public function beforeFilter() {
		$allowed_actions = array('index', 'view');
		$this->Auth->allow($allowed_actions);
        if ($this->Auth->user('role') !== 'admin' && !in_array($this->action, $allowed_actions)) 
        	$this->redirect($this->referer());
        if(!$this->Auth->user())
        	$this->redirect(array('controller' => 'pages', 'action' => 'display'));

        parent::beforeFilter();
    }

	public function index() {

		if ($this->Auth->user('role') !== 'admin') {
			$options = array('conditions' => array('Ticket.user_id' => $this->Auth->user('id')));
			$this->set('tickets', $this->Ticket->find('all', $options));
		}
		if($this->Auth->user('role') === 'admin') {
			$this->Ticket->recursive = 1;
			$this->set('tickets', $this->Paginator->paginate());	
		}
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
		$this->set('ticket', $this->Ticket->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {


		

		$this->Ticket->Event->find('list');
		$this->set(compact('events'));

		if ($this->request->is('post')) {

			$qtdTickets = $this->request->data['Ticket']['qtdTickets'];
			for ($i = 0; $i < $qtdTickets; $i++) { 
				$this->Ticket->create();
				if ($this->Ticket->save($this->request->data)) {
				} else {
					$this->Session->setFlash(__('The ingresso could not be saved. Please, try again.'));
				}
			}

			// $this->Ticket->create();
			// if ($this->Ticket->save($this->request->data)) {
			// 	$this->Session->setFlash(__('The ticket has been saved.'));
			// 	return $this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			// }

			$this->Session->setFlash(__('The ingresso has been saved.'));
			return $this->redirect(array('action' => 'index'));
			
		}
		$events = $this->Ticket->Event->find('list');
		$users = $this->Ticket->User->find('list');
		$this->set(compact('events', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
			$this->request->data = $this->Ticket->find('first', $options);
		}
		$events = $this->Ticket->Event->find('list');
		$users = $this->Ticket->User->find('list');
		$this->set(compact('events', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ticket->id = $id;
		if (!$this->Ticket->exists()) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ticket->delete()) {
			$this->Session->setFlash(__('The ticket has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ticket could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
