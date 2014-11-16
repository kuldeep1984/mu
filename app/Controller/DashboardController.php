<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DashboardController extends AppController {
	public $layout = "admin";
	public function index(){
		$this->set('wcText', "Welcome to the Market Unit Planning");
	}
}

