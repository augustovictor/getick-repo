<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class ContactsController extends AppController {
	public function send() {
		if (!empty($this->data)) {
			$this->Contact->set($this->data);
		
			$Email = new CakeEmail();
		    $Email->from(array($this->data['Contact']['email'] => $this->data['Contact']['username']));
		    $Email->to('victoraweb@gmail.com');
		    $Email->subject('Contact');
		    $Email->send($this->data['Contact']['message']);
	    }
	}
}