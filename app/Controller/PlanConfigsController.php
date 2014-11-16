<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PlanConfigsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $uses = array('PlanConfig');
	public $components = array('Session');
	public $layout = "admin";
	public $title = "Planning Configurations";
	
	public function index($year = null){
		
		$this->set('year', $year);
		$this->set('title', $this->title);
	}
	
	public function showPlanConfigs(){
		$this->layout = '';
		if($this->request->is('ajax')){
			$year = $this->request->data['year'];
			
			$headers = array('Planning Scenarios', 'Planning Description', 'Flag', 'Action');
			$params = $this->fetchScenarios($year);
			$actions = array('deleteScenarios' => 'Delete', 'setDefault' => 'Set as default');
			
			$this->set('headers', $headers);
			$this->set('params', $params);
			$this->set('actions', $actions);
			
			echo $this->render('/Elements/show_list');
		}		
		exit;
	}
	
	public function fetchScenarios($year){
		//all plan configs
		$planConfigs = $this->PlanConfig->find('all', array(
							'fields' => array('PlanConfig.id','PlanConfig.planning_scenario', 'PlanConfig.scenario_desc', 'PlanConfig.flag'),
							'conditions' => array('PlanConfig.planning_year' => $year)
						));
		//preparing rows to display
		$resRows = array();
		foreach($planConfigs as $val){
			$resRows[$val['PlanConfig']['id']][] = $val['PlanConfig']['planning_scenario'];
			$resRows[$val['PlanConfig']['id']][] = ($val['PlanConfig']['scenario_desc'])?substr($val['PlanConfig']['scenario_desc'],0,50):""; 
			$resRows[$val['PlanConfig']['id']][] = ($val['PlanConfig']['flag'])?"Active":"Inactive"; 
		}
		//pr($resRows);
		return($resRows);
		
	}
	
	public function deleteScenarios() {
		$id = $this->request->params['named']['id'];
		$record = $this->PlanConfig->find('first', array(
					'fields' => array('PlanConfig.planning_year'),
					'conditions' => array('PlanConfig.id' => $id)
				));
		$year = '';
		if($record) {
			$year = $record['PlanConfig']['planning_year'];
			$this->PlanConfig->delete($id);
			$this->Session->setFlash(__("Scenario successfully deleted!"), 'flash_success');
		
		}
		$this->redirect(array("action" => "index",$year));
						
	}
	
	public function addPlanConfigs(){	
		
		if($this->request->is('post')){
			$dataArr = array();
			$dataArr['planning_year'] = $this->request->data['planConfig']['planning_year']['year'];
			$dataArr['planning_scenario'] = $this->request->data['planConfig']['planning_scenario'];
			$dataArr['scenario_desc'] = $this->request->data['planConfig']['scenario_desc'];
			$dataArr['flag'] = $this->request->data['planConfig']['flag'];
			
			$this->PlanConfig->create();
			if($this->PlanConfig->save($dataArr)){
				if($dataArr['flag'] == 1){
					//making existing planning scenarios inactive
					$this->PlanConfig->updateAll(
								array("PlanConfig.flag" => 0),
								array("PlanConfig.id <>" => $this->PlanConfig->id)
							);
				}
				$this->Session->setFlash(__("You have added Scenario successfully!"), 'flash_success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__("Some error occurred!"), 'flash_error');
			}
			
		}
		
		$activePlan = $this->PlanConfig->find('first', array('conditions' => array("PlanConfig.flag" => 1)));
		$activeExist = 0;
		if($activePlan) {
			$activeExist = 1;
		}
		
		$this->set('activeExist', $activeExist);
		$this->set('title', 'Add a Scenario');
	}
}

