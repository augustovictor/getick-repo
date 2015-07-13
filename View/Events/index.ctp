<div>

 

 

</div>

<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<?php if($this->App->isAdmin($loggedUser)): ?>
		<?php echo $this->Html->link(__('New Event'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
	<?php endif; ?>
	
	 <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#allEvents" aria-controls="allEvents" role="tab" data-toggle="tab">Todos os eventos</a></li>
    <li role="presentation"><a href="#eventsImGoing" aria-controls="eventsImGoing" role="tab" data-toggle="tab">Eventos já comprados</a></li>
  </ul>

	
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane" id="eventsImGoing">
			<table cellpadding="0" cellspacing="0" class="">
				<thead>
				<tr>
						<?php if($this->App->isAdmin($loggedUser)): ?>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
						<?php endif; ?>
						<th><?php echo $this->Paginator->sort('public'); ?></th>
						<th><?php echo $this->Paginator->sort('paid'); ?></th>
						<th><?php echo $this->Paginator->sort('title'); ?></th>
						<th><?php echo $this->Paginator->sort('date'); ?></th>
						<th><?php echo $this->Paginator->sort('attractions'); ?></th>
						<th><?php echo $this->Paginator->sort('place'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<?php if($this->App->isAdmin($loggedUser)): ?>
							<th class="actions"><?php echo __('Actions'); ?></th>
						<?php endif; ?>
				</tr>
				</thead>
				<tbody>
					<?php foreach($boughtEvents as $boughtEvent): ?>
						<tr>
							<?php if($this->App->isAdmin($loggedUser)): ?>
								<td><?php echo h($boughtEvent['Event']['id']); ?>&nbsp;</td>
							<?php endif; ?>	
							<td><?php echo h($boughtEvent['Event']['public']); ?>&nbsp;</td>
							<td><?php echo h($boughtEvent['Event']['paid']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link(h($boughtEvent['Event']['title']), array('controller' => 'events', 'action' => 'view', $boughtEvent['Event']['id'])); ?>&nbsp;</td>
							<td><?php echo h($boughtEvent['Event']['date']); ?>&nbsp;</td>
							<td><?php echo h($boughtEvent['Event']['attractions']); ?>&nbsp;</td>
							<td><?php echo h($boughtEvent['Event']['place']); ?>&nbsp;</td>
							<td><?php echo h($boughtEvent['Event']['created']); ?>&nbsp;</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- End tabpanel -->
			
		<div role="tabpanel" class="tab-pane active" id="allEvents">
			<table cellpadding="0" cellspacing="0" class="">
				<thead>
				<tr>
						<?php if($this->App->isAdmin($loggedUser)): ?>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
						<?php endif; ?>
						<th><?php echo $this->Paginator->sort('public'); ?></th>
						<th><?php echo $this->Paginator->sort('paid'); ?></th>
						<th><?php echo $this->Paginator->sort('title'); ?></th>
						<th><?php echo $this->Paginator->sort('date'); ?></th>
						<th><?php echo $this->Paginator->sort('attractions'); ?></th>
						<th><?php echo $this->Paginator->sort('place'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<?php if($this->App->isAdmin($loggedUser)): ?>
							<th class="actions"><?php echo __('Actions'); ?></th>
						<?php endif; ?>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($events as $event): ?>
						<tr>
							<?php if($this->App->isAdmin($loggedUser)): ?>
								<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
							<?php endif; ?>	
							<td><?php echo h($event['Event']['public']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['paid']); ?>&nbsp;</td>
							<td><?php echo $this->Html->link(h($event['Event']['title']), array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['date']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['attractions']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['place']); ?>&nbsp;</td>
							<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
							<?php if($this->App->isAdmin($loggedUser)): ?>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $event['Event']['id']))); ?>
								</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- End tabpanel -->
	</div> <!-- End tab-container -->

		<div class="tab-content">

			<div role="tabpanel" class="tab-pane active" id="allEvents">
				
			</div> <!-- End tabpanel -->

			<div role="tabpanel" class="tab-pane" id="eventsImGoing">		
				
				</div> <!-- End tabpanel -->

		</div> <!-- End tab-content -->
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
