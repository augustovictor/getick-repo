<div class="invitees form">
<?php echo $this->Form->create('Invitee'); ?>
	<fieldset>
		<legend><?php echo __('Editar Convidado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('vip');
		echo $this->Form->input('document_type', array('class' => 'form-control'));
		echo $this->Form->input('document_number', array('class' => 'form-control'));
		echo $this->Form->input('event_id', array('class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
