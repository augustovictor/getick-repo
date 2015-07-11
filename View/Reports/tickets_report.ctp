<div class="tickets index">
	<h2><?php echo __('Relatório de ingressos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lot'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('sold_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tickets as $ticket): ?>
	<tr>
		<td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['id'])); ?>
		</td>
		<td>
			<?php if($ticket['User']['name']): ?>
				<?php echo ($this->Html->link($ticket['User']['name'], array('controller' => 'users', 'action' => 'view', $ticket['User']['id']))); ?>
			<?php endif; ?>
			
			<?php if(!$ticket['User']['name']): ?>
				<?php echo $this->App->ticketOwner($ticket['User']['name']); ?>
			<?php endif; ?>

		</td>
		<td><?php echo h($ticket['Ticket']['lot']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['price']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['created']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['sold_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ticket['Ticket']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticket['Ticket']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
