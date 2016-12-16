<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//process.php

Class Main extends CI_Controller{
		
	public function index(){
		if ($this->session->userdata("goldCount" === NULL)){
			$this->reset();
		}
		if ($this->session->userdata("activityArray" === NULL)){
			$this->reset();
		}
		$total = $this->session->userdata('goldCount'); 	//setting $total to be the value of key goldCount ??
		$this->load->view("locations", ["goldCount"=>$total]); //sending this info to the view.
		$this->output->enable_profiler(true);	//special line to see more stuff on var_dump().
	}

	public function __construct(){
		parent::__construct(); 
	}

	public function reset(){
		$this->session->set_userdata("goldCount",0);
		$this->session->set_userdata("activityArray", ["Can't initialize blank wtf."]);
		redirect('/');
	}
	private function addActivity($newgold, $building){
		//activity array
		$msg = "You visited the $building and got $newgold coins!";	//the message template.
		$actArr = $this->session->userdata("activityArray");		//$actArr as value to activityArray key.
		// var_dump($actArr);		//THROWING ERROR bc it says $actArr needs to be an array but right now it's null, even though i set it as an array in line 25 and call it on index().
		// die;
		// $actArr = [];
		array_push($actArr, $msg);	//array_unshift($arr, $msg); ??	//push message into array.
		$this->session->set_userdata("activityArray", $actArr);		//set updated arr in session.
	}

	public function process_money(){
		switch ($this->input->post('building')){
			case "farm":
				$newgold = rand(10,20);
				$this->session->set_userdata('newgold', $newgold);
				$this->addActivity($newgold, 'farm');
				break;

			case "cave":
				$newgold = rand(5,10);
				$this->session->set_userdata('newgold', $newgold);
				$this->addActivity($newgold, 'cave');
				break;

			case "house":
				$newgold = rand(2,5);
				$this->session->set_userdata('newgold', $newgold);
				$this->addActivity($newgold, 'house');
				break;

			case "casino":
				// $this->session->set_userdata('newgold', rand(0,50));
				// $earnings = rand(0,50);
				// $multiplier = 1;
				// $successOdds = rand(1,100);
				// if ($successOdds < 80){
				// 	$multiplier = -1;
				// }
				// $newgold = ($earnings * $multiplier);
					$newgold = rand(-50,50);
					$this->session->set_userdata('newgold', $newgold);
					$this->addActivity($newgold, 'casino');
				break;

			default:
				echo "Cheater!";
		}
		//update gold:
		$this->session->set_userdata("goldCount", ($this->session->userdata("goldCount")+$this->session->userdata("newgold")));
		$total = $this->session->userdata('goldCount');
		// $this->session->set_userdata("currentGold", $this->session->userdata("currentGold") + $newgold);	//this line that he struggled with for a year because smth about php being too helpful?		
		redirect('/');
	}
}
?>