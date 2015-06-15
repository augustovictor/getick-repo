<h2> Contato </h2>

<p>
	Se você é organizador ou promotor de festas, entre em contato conosco:
</p>

<div class="comments form">
	<?php echo $this->Form->create('Contact', array('controller' => 'contacts', 'action' => 'send')); ?>
		<fieldset>
			<legend><?php echo __('Sua mensagem'); ?></legend>
		<?php
			echo $this->Form->input('name', array('class' => 'form-control'));
			echo $this->Form->input('email', array('type' => 'email', 'class' => 'form-control'));
			echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'form-control'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
