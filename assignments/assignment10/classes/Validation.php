<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case "name": return $this->name($value); break;
            case "address":return $this->address($value); break;
            case "city":return $this->city($value); break;
            case "state":return $this->state($value); break;
			case "phone": return $this->phone($value); break;
            case "email": return $this->email($value); break;
            case "dob": return $this->dob($value); break;
            case "password": return $this->password($value); break;
            case "status": return $this->status($value); break;
		}
	}
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function address($value){
		$match = preg_match('/^[a-z0-9 .\-]+$/i', $value);
		return $this->setError($match);
	}
    private function city($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}
    private function state($value){
		$match = preg_match('/\b([A-Z]{2})\b/', $value);
		return $this->setError($match);
	}
	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}
    private function email($value){
		$match = preg_match('/^\\S+@\\S+\\.\\S+$/', $value);
		return $this->setError($match);
	}
    private function dob($value){
		$match = preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/', $value);
		return $this->setError($match);
	}

    private function password($value){
		$match = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)” + “(?=.*[-+_!@#$%^&*., ?]).+$/', $value);
		return $this->setError($match);
	}

    private function status($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}