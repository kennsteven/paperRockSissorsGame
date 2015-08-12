<?php
		function getNameWinner($stringWinner){
		$i = 2;
		$name = "";
		while($stringWinner{$i} != '"'){
			$name .= $stringWinner{$i};
			$i++;
		}
		return $name;
	}
?>