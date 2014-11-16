<table>
	<tr>
		<?php foreach($headers as $header): ?>
			<th><?php echo $header; ?></th>
		<?php endforeach;?>
	</tr>
	<?php foreach($params as $key => $values): ?>
	<tr>
		<?php foreach($values as $v): ?>
		<td>
			<?php echo $v; ?>
		</td>
		<?php endforeach; ?>
		<td>
			<?php foreach($actions as $actionKey => $actionText): ?>
				<?php echo $this->Form->postLink($actionText, array("action" => $actionKey, 'id' => $key), array('confirm' => 'Are you sure!')); ?>
				&nbsp;&nbsp;
			<?php endforeach; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>