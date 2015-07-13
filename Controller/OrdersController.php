<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrdersController extends AppController {

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
		$allowed_actions = array('add');
		$this->Auth->allow($allowed_actions);
        if ($this->Auth->user('role') !== 'admin' && !in_array($this->action, $allowed_actions)) 
        	$this->redirect($this->referer());

        parent::beforeFilter();
    }


	public function index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ticket) {

		if ($this->request->is('post')) {
			$this->Order->create();
			$this->request->data['Order']['ticket_id'] = $ticket;
			$this->request->data['Order']['user_id'] = $this->Auth->user('id');
			$ticketObj = $this->Order->Ticket->find('first', array('conditions' => array('Ticket.id' => $ticket)));
			$ticketObj['Ticket']['user_id'] = $this->Auth->user('id');
			// print_r($ticketObj['Ticket']['id']);
			if ($this->Order->save($this->request->data)) {
				$this->Order->Ticket->save($ticketObj);
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list');
		$tickets = $this->Order->Ticket->find('list');
		$this->set(compact('users', 'tickets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
		$tickets = $this->Order->Ticket->find('list');
		$this->set(compact('users', 'tickets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
