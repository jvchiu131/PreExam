<?php


class ControllerClient{
	static public function ctrAddClient($data){
	   	$answer = (new ModelClient)->mdlAddClient($data);
	}

	static public function ctrEditClient($data){
	   	$answer = (new ModelClient)->mdlEditClient($data);
	}

	static public function ctrShowClientList(){
		$answer = (new ModelClient)->mdlShowClientList();
		return $answer;
	}

	static public function ctrShowClient($item, $value){
		$answer = (new ModelClient)->mdlShowClient($item, $value);
		return $answer;
	}	
}