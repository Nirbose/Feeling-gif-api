<?php
// Pas encore en POO Rip...

$json = [];

if(isset($_GET['feeling']) && !empty($_GET['feeling']) && isset($_GET['id']) && !empty($_GET['id'])) {
	$feeling = htmlspecialchars($_GET['feeling']);
	if(is_numeric($_GET['id'])) {
		
		$file = file_exists("./".$feeling."/".$_GET['id'].".gif");
		$json['success'] = 200;
		$json['exist'] = $file;
		$json['link'] = "https://enzia.toile-libre.org/cdn/feeling/".$feeling."/".$_GET['id'].".gif";
		
		if($json['exist'] == false) {
			$random = rand(1, 50);
			header("Location: https://enzia.toile-libre.org/cdn/feeling/script.php?feeling=$feeling&id=$random");
		}
		
	} else {
		if(isset($_GET['force_success']) && $_GET['force_success'] == true) {
			$random = rand(1, 50);
			header("Location: https://enzia.toile-libre.org/cdn/feeling/script.php?feeling=$feeling&id=$random");
		} else {
			$json['success'] = 403;
			$json['error'] = "Id is not a number";
		}
	}
	
} elseif(isset($_GET['feeling']) && !empty($_GET['feeling']) && isset($_GET['random']) && $_GET['random'] == true) {
	$feeling = htmlspecialchars($_GET['feeling']);
	$random = rand(1, 50);
	$file = file_exists("./".$feeling."/".$random.".gif");
	$json['success'] = 200;
	$json['exist'] = $file;
	$json['link'] = "https://enzia.toile-libre.org/cdn/feeling/".$feeling."/".$random.".gif";
		
	if($json['exist'] == false) {
		$random = rand(1, 50);
		header("Location: https://enzia.toile-libre.org/cdn/feeling/script.php?feeling=$feeling&id=$random");
	}
		
	
} else {
	$json['success'] = 403;
	$json['error'] = "POST requests are expected";
}

header('Content-Type: application/json');
echo json_encode($json);