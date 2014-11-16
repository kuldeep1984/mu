<?php $this->assign('title', $title); ?>
<?php echo $this->Form->create() ?>
<table>
	<tbody>
		<tr>
			<td width="20%">
				<span>Select a Planning Year</span>
			</td>
			<td>
				<?php echo $this->Form->input('planConfig.planning_year', array('type' => 'date', 'minYear' => date('Y'), 'maxYear' => date('Y') + 10,'dateFormat' => 'Y', 'label' => false, 'div' => false, 'empty' => '-select-')); ?>
			</td>
		</tr>
		<tr>
			<td width="20%">
				<span>Planning Scenario Short code</span>
			</td>
			<td>
				<?php echo $this->Form->input('planConfig.planning_scenario', array('label' => false, 'div' => false)); ?>
			</td>
		</tr>
		<tr>
			<td width="20%">
				<span>Scenario Description</span>
			</td>
			<td>
				<?php echo $this->Form->input('planConfig.scenario_desc', array('label' => false, 'div' => false)); ?>
			</td>
		</tr>
		<tr>
			<td width="20%">
				<span>Flag</span>
			</td>
			<td>
				<span>
					<?php echo $this->Form->input('planConfig.flag', array('type' => 'radio', 'label' => false, 'div' => false, 'options' => array('1' => 'active', '0' => 'inactive'), 'legend' => false, 'separator' => '<br/><br/>'), array('legend' => false)); ?>
				</span>
			</td>
		</tr>
		<tr>
			<td width="20%">&nbsp;</td>
			<td>
				<span class="actions">
					<?php echo $this->Form->submit('Save', array('label' => false, "div" => false, 'onclick'=>'return validateForm()')) ?>
					<?php echo $this->Form->input('Cancel', array('type' => 'button', 'class' => 'actions', 'label' => false, "div" => false)) ?>
				</span>
			</td>
		</tr>
	</tbody>
</table>
<?php echo $this->Form->end()?>
<script type="text/javascript">
	function validateForm(){
		var activeExist = "<?php echo $activeExist; ?>";
		var flagChk = $('#planConfigFlag1').is(":checked");
		if(activeExist && flagChk == true){
			if(confirm("Making this default scenario [Will impact the tool globally] . Are you sure? ")){
				return true;
			} else {
				return false;
			}
		}
		
	}
</script>