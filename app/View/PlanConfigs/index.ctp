<?php $this->assign('title', $title); ?>
<table>
	<tr>
		<td>
			<strong>Select a Planning Year</strong>
			<?php echo $this->Form->input('year', array('type' => 'date', 'minYear' => date('Y'), 'maxYear' => date('Y') + 10,'dateFormat' => 'Y', 'label' => false, 'div' => false, 'empty' => '-select-', 'selected' => array('year' => $year) )); ?>
			<?php echo $this->Form->button('show list', array('type' => 'button', 'onclick' => 'showList()'))?>
		</td>
		<td>
			<?php echo $this->Html->link('Add a Scenario', array('controller' => 'planConfigs', 'action' => 'addPlanConfigs'))?>
			<?php echo $this->Form->button('Import', array('type' => 'button', 'onclick' => 'showList()'))?>
			<?php echo $this->Form->button('Export', array('type' => 'button', 'onclick' => 'showList()'))?>
		</td>
	</tr>
	<tr>
		<td colspan='2' id="plan-config-list"></td>
	</tr>
</table>
<script>
	$(document).ready(function(){
		showList();
	});
	function showList(){
		var year = $('#yearYear').val();
		var url = "<?php echo $this->webroot?>" + "planConfigs/showPlanConfigs";
		if(year != '') {
			$.ajax({
				'url':url,
				'data':'year=' + year,
				'type':'post', 
				'success':function(msg){
					$('#plan-config-list').html(msg);
				},
				'error':function(){
					alert('Some error occurred!');
				}
			});
		}
	}
</script>