<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<?php echo $this->Html->link(__('New Event'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
	<table cellpadding="0" cellspacing="0" class="">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('public'); ?></th>
			<th><?php echo $this->Paginator->sort('paid'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('attractions'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['public']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['paid']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['date']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['attractions']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['place']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $event['Event']['id']))); ?>
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
