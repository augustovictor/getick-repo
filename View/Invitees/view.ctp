<div class="invitees view">
<h2><?php echo __('Invitee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invitee['Invitee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($invitee['Invitee']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vip'); ?></dt>
		<dd>
			<?php echo h($invitee['Invitee']['vip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document Type'); ?></dt>
		<dd>
			<?php echo h($invitee['Invitee']['document_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document Number'); ?></dt>
		<dd>
			<?php echo h($invitee['Invitee']['document_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invitee['Event']['title'], array('controller' => 'events', 'action' => 'view', $invitee['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invitee'), array('action' => 'edit', $invitee['Invitee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invitee'), array('action' => 'delete', $invitee['Invitee']['id']), array(), __('Are you sure you want to delete # %s?', $invitee['Invitee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invitees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invitee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
