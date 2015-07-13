<div class="comments view">
<h2><?php echo __('Comment'); ?></h2>
	<dl>
		<dt><h3><?php echo __('User'); ?></h3></dt>
		<dd>
			<?php if($comment['Comment']['user_id'] == 0) echo $comment['Comment']['username']; ?>
			<?php echo $this->Html->link($comment['User']['name'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><h3><?php echo __('Event'); ?></h3></dt>
		<dd>
			<?php echo $this->Html->link($comment['Event']['title'], array('controller' => 'events', 'action' => 'view', $comment['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><h3><?php echo __('Comment'); ?></h3></dt>
		<dd>
			<blockquote>
				<?php echo h($comment['Comment']['comment']); ?>
			</blockquote>
			&nbsp;
		</dd>
	</dl>
</div>
