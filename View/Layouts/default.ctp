<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Getick');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('fav-icon');

		// echo $this->Html->css('cake.generic');
		// echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('http://fonts.googleapis.com/css?family=PT+Sans');
		echo $this->Html->css('myCss');

		echo $this->Html->script('jquery-1.11.0');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('custom-js');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=192187124214800";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</head>
<body>

	<div class="nav">
		<?php if(isset($loggedUser)) print_r($loggedUser); ?>
		<?php if (isset($loggedUser)): ?>
			<?php echo $this->Html->link('Eventos', array('controller' => 'events', 'action' => 'index'), array('id' => 'eventos-btn', 'class' => 'col-md-2')); ?>

			<?php #echo $this->Html->link('Listas de convidados', array('controller' => ''), array('id' => 'listas-btn', 'class' => 'col-md-2')); ?>

			<?php echo $this->Html->link('Meus ingressos', array('controller' => 'tickets', 'action' => 'index'), array('id' => 'listas-btn', 'class' => 'col-md-2  align-right')); ?>

			<?php if($this->App->isAdmin($loggedUser)): ?>

				<?php echo $this->Html->link('Relatório de eventos', array('controller' => 'reports', 'action' => 'events_report'), array('id' => 'listas-btn', 'class' => 'col-md-2  align-right')); ?>

				<?php echo $this->Html->link('Relatório de ingresoss', array('controller' => 'reports', 'action' => 'tickets_report'), array('id' => 'listas-btn', 'class' => 'col-md-2 align-right')); ?>

				<?php echo $this->Html->link('Relatório de usuários', array('controller' => 'reports', 'action' => 'users_report'), array('id' => 'listas-btn', 'class' => 'col-md-2 align-right')); ?>
			<?php endif; ?>


			<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'col-md-1 pull-right')); ?>
		 <?php endif; ?>

		<?php if (!isset($loggedUser)): ?> 
			<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'col-md-2 align-right')); ?>
			<?php echo $this->Html->link('Cadastro', array('controller' => 'users', 'action' => 'add'), array('class' => 'col-md-2 align-right')); ?>
		<?php endif; ?>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="">
				<div id="brand">
					<p class="text-center">
						<?php echo $this->Html->link($this->Html->image('getick-brand.png'), array('controller' => 'pages', 'action' => 'display', 'home'), array('escape' => false)); ?>
						<p id="brand-subtitle" class="text-center"> Ta procurando pra onde ir hoje? A getick te mostra! </p>
					</p>
				</div>
			</div>
			<!-- End  -->
		</div>
		<!-- End row -->
		<div id="content" class="">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="row col-md-12">
			<div id="payment-container" class="row border-container">
				<span>Formas de pagamento:</span>
				<a href="https://pagseguro.uol.com.br/" target="_blank">
					<?php echo $this->Html->image('pagseguro.png'); ?>
				</a>
			</div>
			<!-- End row -->

			<br>
			
			<div class="row text-center">
				<?php echo $this->Html->link('Institucional', array('controller' => 'pages', 'action' => 'display', 'institutional'), array('class' => 'col-md-4 align-right')); ?>
				<?php echo $this->Html->link('Ajuda', array('controller' => 'pages', 'action' => 'display', 'help'), array('class' => 'col-md-4 align-right')); ?>
				<?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'display', 'contact'), array('class' => 'col-md-4 align-right')); ?>
			</div>
			<br>
			<br>

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
