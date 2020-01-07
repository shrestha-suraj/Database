<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Arrays</title>
	</head>
	<body>
	<?php
		$numbers = array();
		$numbers2 = array(4, 8, 15, 16, 23, 42);

		$numbers3 = array(5, "bear", $numbers2, "ram", 3.14);
		echo "Numbers2[1]: ".$numbers2[1]."<br />";
		
		echo "<pre>";
		print_r($numbers3);   //Print readable function for troubleshooting
		$numbers3[7]="mountain lion";
		print_r($numbers3);
		foreach($numbers3 as $oneNumber){
			echo $oneNumber."<br/>";
		}
		$sportsLeagues=["ncaa","nfl","nba","mlb","fifa"];
		$ncaa=["sport"=>"basketball","championship"=>"March Madness"];
		$nfl=["sport"=>"football","championship"=>"Super Bowl"];
		$nba=["sport"=>"basketball","championship"=>"Series"];
		$mlb=["sport"=>"basketball","championship"=>"World Series"];
		$fifa=["sport"=>"soccer","championship"=>"World Cup"];
		echo $fifa["sport"]."<br/>";
		echo $fifa["championship"]."<br/>";
		echo ${$sportsLeagues[2]}["sport"]."<br/>";
		foreach($sportsLeagues as $oneSport){
			echo ${$oneSport}['sport']."<br/>";
			echo ${$oneSport}['championship']."<br/>";
		}
		if (array_search("nba",$sportsLeagues)) 
		{
			echo "NBA found!<br/>";
		}
		else{
			echo "NBA not found!<br/>";
		}
		if (array_search("mls",$sportsLeagues)) 
		{
			echo "MLS found!<br/>";
		}
		else{
			echo "MLS not found!<br/>";
		}
	?>
	</body>
</html>