<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<?php echo $this->Html->link(__('Editar Evento'), array('action' => 'edit', $event['Event']['id']), array('class' => 'btn btn-primary')); ?>
	<?php echo $this->Form->postLink(__('Deletar Evento'), array('action' => 'delete', $event['Event']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
	<?php echo $this->Html->link(__('Novo convidado'), array('controller' => 'invitees', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
	<?php echo $this->Html->link(__('Novo lote de ingressos'), array('controller' => 'tickets', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>

	<dl>
		<dd>
			<?php echo __('Visível: '); ?>
			<?php echo h($event['Event']['visible']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Público: '); ?>
			<?php echo h($event['Event']['public']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Pago ou gratuito: '); ?>
			<?php echo h($event['Event']['paid']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Title: '); ?>
			<?php echo h($event['Event']['title']); ?>
			&nbsp;
		</dd>
<!-- 		<dd>
			<?php #echo __('Path: '); ?>
			<?php #echo h($event['Event']['path']); ?>
			&nbsp;
		</dd> -->
		<dd>
			<?php echo __('Data: '); ?>
			<?php echo h($event['Event']['date']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Atrações: '); ?>
			<?php echo h($event['Event']['attractions']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Local: '); ?>
			<?php echo h($event['Event']['place']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php echo __('Criado em: '); ?>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Convidados'); ?></h3>
	<?php if (!empty($event['Invitee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Vip'); ?></th>
		<th><?php echo __('Document Type'); ?></th>
		<th><?php echo __('Document Number'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Invitee'] as $invitee): ?>
		<tr>
			<td><?php echo $invitee['id']; ?></td>
			<td><?php echo $invitee['name']; ?></td>
			<td><?php echo $invitee['vip']; ?></td>
			<td><?php echo $invitee['document_type']; ?></td>
			<td><?php echo $invitee['document_number']; ?></td>
			<td><?php echo $invitee['event_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'invitees', 'action' => 'view', $invitee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'invitees', 'action' => 'edit', $invitee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'invitees', 'action' => 'delete', $invitee['id']), array(), __('Are you sure you want to delete # %s?', $invitee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
			<?php echo $this->Html->link(__('Adiiconar convidado'), array('controller' => 'invitees', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Ingressos para este evento'); ?></h3>
	<?php if (!empty($event['Ticket'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Lot'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Created At'); ?></th>
		<th><?php echo __('Sold At'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($event['Ticket'] as $ticket): ?>
		<tr>
			<td><?php echo $ticket['id']; ?></td>
			<td><?php echo $ticket['event_id']; ?></td>
			<td><?php echo $ticket['user_id']; ?></td>
			<td><?php echo $ticket['lot']; ?></td>
			<td><?php echo $ticket['price']; ?></td>
			<td><?php echo $ticket['created']; ?></td>
			<td><?php echo $ticket['sold_at']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tickets', 'action' => 'view', $ticket['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tickets', 'action' => 'edit', $ticket['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tickets', 'action' => 'delete', $ticket['id']), array(), __('Are you sure you want to delete # %s?', $ticket['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div>




<div class="related">
	<h3><?php echo __('Comments'); ?></h3>
	<?php if (empty($event['Comment'])) echo '<i> Nenhum comentário ainda. </i>'; ?>
	<?php if (!empty($event['Comment'])): ?>
	<ul>
	<?php foreach ($event['Comment'] as $comment): ?>
		<li>
			<?php #echo $comment['id']; ?>
			<?php echo $comment['user_id']; ?>
			<br />
			<blockquote>
				<?php echo $comment['comment']; ?>
			</blockquote>
			<div class="actions row">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tickets', 'action' => 'edit', $comment['id']), array('class' => 'btn btn-xs btn-success')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('class' => 'btn btn-xs btn-danger'), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</div>
		</li>
		<br>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>



</div>
