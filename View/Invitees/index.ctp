<div class="invitees index">
	<h2><?php echo __('Invitees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('vip'); ?></th>
			<th><?php echo $this->Paginator->sort('document_type'); ?></th>
			<th><?php echo $this->Paginator->sort('document_number'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($invitees as $invitee): ?>
	<tr>
		<td><?php echo h($invitee['Invitee']['id']); ?>&nbsp;</td>
		<td><?php echo h($invitee['Invitee']['name']); ?>&nbsp;</td>
		<td><?php echo h($invitee['Invitee']['vip']); ?>&nbsp;</td>
		<td><?php echo h($invitee['Invitee']['document_type']); ?>&nbsp;</td>
		<td><?php echo h($invitee['Invitee']['document_number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($invitee['Event']['title'], array('controller' => 'events', 'action' => 'view', $invitee['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invitee['Invitee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invitee['Invitee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invitee['Invitee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $invitee['Invitee']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Invitee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
