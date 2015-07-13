<h2><?php echo __('Relatório de eventos'); ?></h2>
<?php foreach ($events as $event): ?>
<?php $counter = 1; ?>
	<h3> 
		<?php echo h($event['Event']['title']); ?>
	</h3>
	<h5><?php echo $this->App->formatDate(h($event['Event']['date'])); ?> </h5>

	<br>

	<h4> Tickets para este evento ( <?php echo count($event['Ticket']); ?> )</h4>
	<?php if(empty($event['Ticket'])) echo '<i> Nenhum ingresso cadastrado. </i>'; ?>
	<?php if(!empty($event['Ticket'])): ?>
		<table>
			<thead>
				<tr>
					<th> Id </th>
					<th> Lote </th>
					<th> Valor </th>
					<th> Comprador </th>
				</tr>
			</thead>

			<tbody>
				<?php foreach (($event['Ticket']) as $ticket): ?>
					<tr>
						<td> <?php echo $ticket['id']; ?> </td>
						<td> <?php echo $ticket['lot']; ?> </td>
						<td> <?php echo $this->App->priceFormat($ticket['price']); ?> </td>
						<td> 
							<?php if(isset($ticket['user_id'])) echo $this->Html->link($this->App->ticketOwner($ticket['user_id']), array('controller' => 'users', 'action' => 'view', $ticket['user_id'])); ?>
							 <?php if(!isset($ticket['user_id'])) echo $this->App->ticketOwner($ticket['user_id']); ?> 
						</td>
					</tr>
			
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif; ?>
	<p>
		<!-- Total arrecadado: <?php #echo $soldTicketsTotal; ?> -->
	</p>

	<br>
	<br>

	<h4> Lista para o evento ( <?php echo count($event['Invitee']); ?> pessoas )</h4>
	<?php if(empty($event['Invitee'])) echo '<i> Ninguém foi convidado ainda. </i>'; ?>
	<?php if(!empty($event['Invitee'])) ?>
	<?php foreach ($event['Invitee'] as $invitee): ?>
		<p>
			<?php echo $counter . ' - ' . $this->App->ifVip($invitee['vip']) . ' ' . $invitee['name']; ?>
			<?php $counter++; ?>
		</p>
	<?php endforeach; ?>
	<br>
	<hr>
	<br>
<?php endforeach; ?>