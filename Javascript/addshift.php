<?php 
$job = $_POST['job'];
$startDate = $_POST['start'];
$endDate = $_POST['end'];
$startTime = $_POST['stime'];
$endTime = $_POST['etime'];
$length = $_POST['length'];
$pay = $_POST['pay'];

if ($endDate && $endTime) {
	$start = $startDate.' '.$startTime;
	$end = $endDate.' '.$endTime;
	$dtStart = new DateTime($start);
	$dtEnd = new DateTime($end);
	$hour1=0;
	$hour2=0;
	$diff= $dtStart->diff($dtEnd);
	if($diff->format('%a') > 0){
		$hour1 = $diff->format('%a')*24;
	}
	if($diff->format('%h') > 0){
		$hour2 = $diff->format('%h');
	}
	$numShifts = ($hour1+$hour2)/$length;
	for ($i=1; $i <= floor($numShifts); $i++) { 
		$shiftStartTime = date('Y/m/d H:i',strtotime('+'.$length*$i.' hour',strtotime($start)));
		$temp = ($length*$i+2);
		$shiftEndTime = date('Y/m/d H:i',strtotime('+'.$temp.' hour',strtotime($start)));
		//echo $shiftEndTime;
		$quertyShift = "INSERT INTO `jobs` (`job`, `pay`, `start`, `end`, `length`) VALUES ('$job', '$pay', '$shiftStartTime', '$shiftEndTime', '$length')";
		$resultshift = mysqli_query($con, $quertyShift);
	}
}
else{
	$start = $startDate.' '.$startTime;
	$End = date('Y/m/d H:i',strtotime('+'.$length.' hour',strtotime($start)));
	$quertyShift = "INSERT INTO 'jobs' (`job`, `pay`, `start`, `end`, `length`) VALUES ('$job', '$pay', '$start', '$end', '$length')";
	$resultshift = mysqli_query($con, $quertyShift);
}
?>