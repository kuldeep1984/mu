<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PlanConfig extends AppModel{
	public $useTable = "mu_plan_configs";	
	public $validate = array(
		'planning_year' => array(
			'rule' => 'notEmpty'
		),
		'planning_scenario' => array(
			'rule' => 'notEmpty'
		),
		/*'scenario_desc' => array(
			'rule' => 'notEmpty'
		),*/
		'flag' => array(
			'rule' => 'notEmpty'
		)
	);
}
