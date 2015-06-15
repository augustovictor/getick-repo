
<!-- <div class="row">
	<div class="">
		<div id="top-menu">
			<ul class="list-inline text-center">
				<li>
					<h6><a href="#">HOME</a></h6>
				</li>
				<li>
					<h6><a href="#">HOME</a></h6>
				</li>
				
			</ul>
		</div>
	</div> -->
	<!-- End  -->
<!-- </div> -->
<!-- End row -->


<div class="row ">
	<div class="">
		<div id="upcoming-events" class="carousel slide" data-ride="carousel" data-interval="false">
			<!-- Indicators -->
			<!-- <ol class="carousel-indicators">
				<li data-target="#upcoming-events" data-slide-to="0" class="active"></li>
				<li data-target="#upcoming-events" data-slide-to="1"></li>
			</ol> -->

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php foreach($events as $event): ?>
					<div id="event" class="item"> <!-- Id dinamico -->
					  <?php echo $this->Html->image($event['Event']['path']); ?>
					  <div class="carousel-caption">
					    <h3><?php echo $event['Event']['title']; ?></h3>
					    <h5><?php echo $event['Event']['date']; ?> - <?php echo $event['Event']['place']; ?></h5>
					  </div>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#upcoming-events" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#upcoming-events" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>
	<!-- End  -->
</div>
<!-- End row -->

<br>
<br>
<div id="infos">
	<?php foreach($events as $event): ?>
		<div id="event-info" class="row text-center info-container"> <!-- Id dinamico -->
			<div class="col-md-4">
				<h1 class="info-title"> Event </h1>
				<p>
					<?php echo $event['Event']['title']; ?>
					<br>
					Evento público: <?php echo $event['Event']['public']; ?>
					<br>
					Evento pago: <?php echo $event['Event']['paid']; ?>
					<br>
					Data e hora: <?php echo $event['Event']['date']; ?>
					<br>
					Atrações: <?php echo $event['Event']['attractions']; ?>

					<div class="fb-share-button" data-href="http://localhost:8888/getick/cakephp-2.6.7/events/view/<?php echo $event['Event']['id']; ?>" data-layout="button_count"></div>

				</p>
			</div>
			<div class="col-md-4 middle-column">
				<h1 class="info-title"> Local </h1>
				<br>
				<p>
					<?php echo $event['Event']['place']; ?>
				</p>

				<a class="col-md-12" href="https://maps.google.com/maps?daddr=N+-+Centro,+S%C3%A3o+Lu%C3%ADs+-+Maranh%C3%A3o,+65010-070,+Brasil&hl=en&ie=UTF8&sll=-2.527528,-44.306822&sspn=0.008017,0.011351&geocode=Ffl82f8dXg9c_Slzuhvlwo72BzHBRTnElZolIg&mra=ls&t=m&z=14" target="_blank"> Como chegar</a>
			</div>
			<div class="col-md-4">
				<h1 class="info-title"> Comprar </h1>
				<?php if(empty($event['Ticket'])) echo '<i> Nenhum ingresso foi cadastrado para este evento ainda. </i>' ?>
				<?php foreach($event['Ticket'] as $ticket): ?>
				<?php if($ticket['user_id']) continue; ?>
				<p>
					<form role="form">

						<div class="form-group">
							<div class="styled-select" valor="12">
								<select required="true">
								</select>
							</div>
							<br>
								
							
							
							<!-- <label for="promotionalCode"> Número de referência (não obrigatório): </label> -->
							<!-- <input id="promotionalCode" class="form-control col-md-2" placeholder="Ex: A812B129D7" type="text"/> -->
							<!-- <br>
							<br>
							<br> -->
							<p>
					        <?php echo $this->Html->link('Seguir para pagamento', array('controller' => 'tickets', 'action' => 'buy', $ticket['id']), array('class' => 'btn btn-success col-md-12')); ?>
							</p>
						</div>
						<!-- End form-group -->

					</form>
				</p>
				<!-- <a class="btn btn-danger" href="#"> Como chegar</a> -->
				<?php break; ?>
				<?php endforeach; ?>
			</div>

			<br />
			<h3 class="col-md-12 text-center"> 
				Comentários sobre este evento
				<br>
				<?php echo $this->Html->Link('add comentário', array('controller' => 'comments', 'action' => 'add'), array('class' => 'btn btn-xs btn-primary')); ?>
			</h3>
			<p class="row col-md-12">
				<i>Nenhum comentário ainda.</i>
			</p>
			<?php if(!empty($event['Comment'])): ?>
				<div class="row col-md-12 text-left">
					<ul class="list-unstyled">
						<?php foreach ($event['Comment'] as $comment): ?>
							<li class="row col-md-11 col-md-offset-1">
								<?php #echo $comment['id']; ?>

								<?php if($comment['user_id'] != 0) echo $comment['username']; ?>
								<?php if($comment['user_id'] == 0) echo $comment['username']; ?>
								<br />
								<blockquote>
									<?php echo $comment['comment']; ?>
								</blockquote>
								<?php if($loggedUser): ?>
									<div class="actions row">
										<?php echo $this->Html->link(__('Edit'), array('controller' => 'tickets', 'action' => 'edit', $comment['id']), array('class' => 'btn btn-xs btn-success')); ?>
										<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('class' => 'btn btn-xs btn-danger'), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
									</div>
								<?php endif; ?>
							</li>
							<br>
							<br>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<!-- End row -->
	<?php endforeach; ?>

		

</div>
