<div class="tickets view">
<h2><?php echo __('Ticket'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['User']['name'], array('controller' => 'users', 'action' => 'view', $ticket['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lot'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['lot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sold At'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['sold_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ticket'), array('action' => 'edit', $ticket['Ticket']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ticket'), array('action' => 'delete', $ticket['Ticket']['id']), array(), __('Are you sure you want to delete # %s?', $ticket['Ticket']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($ticket['Order'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $ticket['Order']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $ticket['Order']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Ticket Id'); ?></dt>
		<dd>
	<?php echo $ticket['Order']['ticket_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
	<?php echo $ticket['Order']['date']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Order'), array('controller' => 'orders', 'action' => 'edit', $ticket['Order']['id'])); ?></li>
			</ul>
		</div>
	</div>
	