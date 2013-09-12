<?php

/*
	This script is responsible to retrieve record info from database
*/

if (isset($_SERVER['QUERY_STRING'])) {
	$query = trim($_SERVER['QUERY_STRING']);
	//user input cleanup
	$query = filter_var($query, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
} else
	$query = '';
if (empty($query))
	$response = array(
		'status' => false,
		'info' => array()
	);
else {
	try {
		//database setup
		require_once __DIR__.'/db.class.php';
		$db = new DB(__DIR__.'/yellowpages.sqlite3');
		//prepares the statement acording to the type of request (phonenumber or person's name)
		if (is_numeric($query))
			$st = $db->prepare('SELECT * FROM `phonelist` WHERE `phonenumber` = :query');
		else
			$st = $db->prepare('SELECT * FROM `phonelist` WHERE `firstname` || \' \' || `lastname` = :query');
		//decodes user query
		$query = rawurldecode($query);
		//executes the statement
		$st->execute(array('query' => $query));
		//fetchs the data
		$info = $st->fetchAll(PDO::FETCH_ASSOC);
		if (count($info) == 0)
			$response = array(
				'status' => false,
				'records' => 0,
				'info' => array()
			);
		else
			$response = array(
				'status' => true,
				'records' => count($info),
				'info' => $info
			);
	} catch (Exception $e) {
		$response = array(
			'status' => false,
			'info' => array()
		);
	}
}
//outputs json response
header('Content-Type: application/json');
echo json_encode($response);
