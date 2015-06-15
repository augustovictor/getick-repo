<?php
App::uses('AppController', 'Controller');
/**
 * Invitees Controller
 *
 * @property Invitee $Invitee
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InviteesController extends AppController {

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
	public function index() {
		$this->Invitee->recursive = 0;
		$this->set('invitees', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invitee->exists($id)) {
			throw new NotFoundException(__('Invalid invitee'));
		}
		$options = array('conditions' => array('Invitee.' . $this->Invitee->primaryKey => $id));
		$this->set('invitee', $this->Invitee->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Invitee->create();
			if ($this->Invitee->save($this->request->data)) {
				$this->Session->setFlash(__('The invitee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitee could not be saved. Please, try again.'));
			}
		}
		$events = $this->Invitee->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invitee->exists($id)) {
			throw new NotFoundException(__('Invalid invitee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invitee->save($this->request->data)) {
				$this->Session->setFlash(__('The invitee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invitee.' . $this->Invitee->primaryKey => $id));
			$this->request->data = $this->Invitee->find('first', $options);
		}
		$events = $this->Invitee->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invitee->id = $id;
		if (!$this->Invitee->exists()) {
			throw new NotFoundException(__('Invalid invitee'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Invitee->delete()) {
			$this->Session->setFlash(__('The invitee has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invitee could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
