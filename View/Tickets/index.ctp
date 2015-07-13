<div class="tickets index">

	<h2>
		<?php if($this->App->isAdmin($loggedUser)) echo __('Relatório de ingressos'); ?>
		<?php if(!$this->App->isAdmin($loggedUser)) echo __('Meus ingressos'); ?>
	</h2>
	<?php if(!empty($tickets)): ?>
		<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
				<?php if($this->App->isAdmin($loggedUser)): ?>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
				<?php endif; ?>
				<th><?php echo $this->Paginator->sort('event_id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th><?php echo $this->Paginator->sort('lot'); ?></th>
				<th><?php echo $this->Paginator->sort('price'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('sold_at'); ?></th>
				<?php if($this->App->isAdmin($loggedUser)): ?>
					<th class="actions"><?php echo __('Actions'); ?></th>
				<?php endif; ?>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($tickets as $ticket): ?>
			<tr>
				<?php if($this->App->isAdmin($loggedUser)): ?>
					<td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
				<?php endif; ?>
				<td>
					<?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($ticket['User']['name'], array('controller' => 'users', 'action' => 'view', $ticket['User']['id'])); ?>
				</td>
				<td><?php echo h($ticket['Ticket']['lot']); ?>&nbsp;</td>
				<td><?php echo h($ticket['Ticket']['price']); ?>&nbsp;</td>
				<td><?php echo h($ticket['Ticket']['created']); ?>&nbsp;</td>
				<td><?php echo h($ticket['Ticket']['sold_at']); ?>&nbsp;</td>
				<?php if($this->App->isAdmin($loggedUser)): ?>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $ticket['Ticket']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ticket['Ticket']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ticket['Ticket']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticket['Ticket']['id']))); ?>
					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if(empty($tickets)): ?>
		<i> Nenhum ticket a ser listado. </i>
	<?php endif; ?>
	</tbody>
	</table>
	<?php if($this->App->isAdmin($loggedUser)): ?>
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
	<?php endif; ?>
</div>
