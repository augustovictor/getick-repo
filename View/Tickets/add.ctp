<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
		<legend><?php echo __('Add Ticket'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('lot', array('label' => 'Lote:', 'class' => 'form-control'));
		echo $this->Form->input('qtdTickets', array('label' => 'Quantos ingressos?','class' => 'form-control'));
		echo $this->Form->input('price', array('label' => 'Valor unitário dos ingressos:', 'class' => 'form-control'));
		echo $this->Form->input('created_at');
		echo $this->Form->input('sold_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
