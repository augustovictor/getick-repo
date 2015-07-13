<div class="comments form">
<?php echo $this->Form->create('Comment', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
		<div class="col-md-5">
			<?php
				if(isset($loggedUser)) {
					echo $this->Form->hidden('user_id', array('value' => $loggedUser['id'], 'class' => 'form-control col-md-3'));
					echo $this->Form->input('username', array('type' => 'hidden', 'value' => $loggedUser['name'], 'class' => 'form-control'));
				}
				else echo $this->Form->input('username', array('label' => 'Seu nome:', 'class' => 'form-control'));
				echo $this->Form->input('event_id', array('label' => 'Comentário para o evento:', 'class' => 'form-control'));
				echo $this->Form->input('comment', array('label' => 'Comentário: ', 'class' => 'form-control'));
			?>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>