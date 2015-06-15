<div class="comments form">
<?php echo $this->Form->create('Comment', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
	<?php
		if(isset($loggedUser)) {
			echo $this->Form->input('user_id', array('class' => 'form-control col-md-3'));
			echo $this->Form->input('username', array('type' => 'hidden', 'value' => $loggedUser['name'], 'class' => 'form-control'));
		}
		else echo $this->Form->input('username', array('class' => 'form-control'));
		echo $this->Form->input('event_id', array('class' => 'form-control'));
		echo $this->Form->input('comment', array('class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>