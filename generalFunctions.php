<?php
	function GF_FieldNameForContest($sessionName, $contestId){
		$index = array_search($contestId, $_SESSION[$sessionName]);
		$fieldData = [$_SESSION[$sessionName][$index+1],$_SESSION[$sessionName][$index+2],$_SESSION[$sessionName][$index+3]];
		if (isset($fieldData)) {
			return $fieldData;
		}else{
			return false;
		}
	}

	function GF_FieldNameForTournamnetContest($sessionName, $contestId){
		$index = array_search($contestId, $_SESSION[$sessionName]);
		$fieldData = [$_SESSION[$sessionName][$index+1],$_SESSION[$sessionName][$index+2],$_SESSION[$sessionName][$index+3]];
		if (isset($fieldData)) {
			return $fieldData;
		}else{
			return false;
		}
	}
?>