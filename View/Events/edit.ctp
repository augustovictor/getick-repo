<div class="events form">
<?php echo $this->Form->create('Event', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id', array('class' => 'form-control'));
		echo $this->Form->input('visible');
		echo $this->Form->input('public');
		echo $this->Form->input('paid');
		echo $this->Form->input('title', array('class' => 'form-control'));
		echo $this->Form->input('path', array('type' => 'file'), array('class' => 'form-control'));
		echo $this->Form->input('date');
		echo $this->Form->input('attractions', array('class' => 'form-control'));
		echo $this->Form->input('place', array('class' => 'form-control'));
		echo $this->Form->input('created_at', array('class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
