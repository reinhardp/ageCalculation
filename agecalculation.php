<?php

namespace AgeCalculation;


class AgeCalculationClass
{
	private $msg; 
	
	public function getErrorMessage() {
		return $this->msg;
	}
	
	/*
	 * @param $birthDate (string)
	 * @param $date (string)
	 
	 * @return string
	*/
	private function CalculateAge($birthDate, $date) {
		
		$week = 0;
		$bdate = date_create($birthDate);
		$ddate = date_create($date);
		
		
		var_dump($bdate);
		exit;
		
		if(!$bdate) {
			//throw new \InvalidArgumentException("Der erste Parameter ist kein Datum: $birthDate");
			$this->msg = "Der erste Parameter ist kein Datum!";
			return "";
		}
		if(! $ddate) {
			//throw new \InvalidArgumentException("Der zweite Parameter ist kein Datum: $date");
			$this->msg = "Der zweite Parameter ist kein Datum!";
			return "";
		}
		
		
		$age = date_diff($bdate, $ddate);
		
		$year = $age->format("%y");
		$month = $age->format("%m");
		$day = $age->format("%d");
		
		$retstring = "";
		
		if($day > 6) {
			$week = intval($day / 7);
			$day = $day - $week * 7;
		}
		return array($year, $month, $week, $day);
	}
	
	public function getAgeString($birthDate, $date) {
		
		$retstring = "";
		
		$arr = $this->CalculateAge($birthDate, $date);
		if($arr == "")
			return "";
		
		if($arr[0] > 0)
			if($arr[0] > 1)
				$retstring .= $arr[0] . " Jahre, ";
			else
				$retstring .= $arr[0] . " Jahr, ";
		
		if($arr[1] > 0)
			if($arr[1] > 1)
				$retstring .= $arr[1] . " Monate, ";
			else
				$retstring .= $arr[1] . " Monat, ";

		if($arr[2] > 0)
			if($arr[2] > 1)
				$retstring .= $arr[2] . " Wochen ";
			else
				$retstring .= $arr[2] . " Woche ";

		if($arr[3] > 0)
			if($arr[3] > 1)
				$retstring .= $arr[3] . " Tage ";
			else
				$retstring .= $arr[3] . " Tag ";
		
		return $retstring;
	}

	public function getAgeArray($birthDate, $date) {
		$arr = $this->CalculateAge($birthDate, $date);
		if($arr == "")
			return "";
		
		return $arr;
	}

	public function getAgeHash($birthDate, $date) {
		$arr = $this->CalculateAge($birthDate, $date);
		if($arr == "")
			return "";
		
		return array("year" => $arr[0], "month" => $arr[1], "week" => $arr[2], "day" => $arr[3]);
	}
}

/*
$agecalc = new AgeCalculationClass;
$hash = $agecalc->getAgeHash("08-09-1965", "19-09-2022");
//$arr = $agecalc->getAgeArray("08-09-1965", "19-09-2022");
//$string = $agecalc->getAgeString("08-09-1965", "19-09-2022");

if($string == "") {
	$msg = $agecalc->getErrorMessage();
	var_dump($msg);
	exit;
}
var_dump($string);
*/
