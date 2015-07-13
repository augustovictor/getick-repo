<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
		<div class="col-md-5">
			<?php
				echo $this->Form->input('name', array('class' => 'form-control col-md-span1'));
				// echo $this->Form->input('role');
				echo $this->Form->input('username', array('class' => 'form-control col-md-span1'));
				echo $this->Form->input('password', array('class' => 'form-control col-md-span1'));
				echo $this->Form->input('phone', array('class' => 'form-control col-md-span1'));
				echo $this->Form->input('address', array('class' => 'form-control col-md-span1'));
				echo $this->Form->input('email', array('class' => 'form-control col-md-span1'));
				// echo $this->Form->input('created_at');
				// echo $this->Form->input('number_ref');
			?>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
