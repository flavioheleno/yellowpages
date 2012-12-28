<?php

/*
	This script is responsible to query the database for typeahead data source
*/

$query = trim($_SERVER['QUERY_STRING']);
//user input cleanup
$query = filter_var($query, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
if ($query == '')
	$response = array(
		'status' => false,
		'list' => array()
	);
else {
	try {
		//using session to store cache for 300s
		session_start();
		if ((isset($_SESSION[$query])) && ((time() - intval($_SESSION[$query]['timeout'])) < 300)) {
			$response = array(
				'status' => true,
				'list' => $_SESSION[$query]['data'],
				'cached' => true
			);
		} else {
			//database setup
			require_once __DIR__.'/db.class.php';
			$db = new DB(__DIR__.'/yellowpages.sqlite3');
			//queries the database according to the type of typed data (numbers or letters)
			if (preg_match('/^\+?[0-9]+$/', $query)) {
				//a number was typed, so prepare a statement that looks for phone numbers
				$st = $db->prepare('SELECT phonenumber `DISTINCT` FROM `phonelist` WHERE `phonenumber` LIKE :query LIMIT 0, 8');
				//executes the statement
				$st->execute(array('query' => "%{$query}%"));
				$list = $st->fetchAll(PDO::FETCH_COLUMN, 0);
			} else {
				//a letter was typed, so prepare a statement that looks for names
				$st = $db->prepare('SELECT DISTINCT `firstname`, `lastname` FROM `phonelist` WHERE `firstname` LIKE :query OR `lastname` LIKE :query LIMIT 0, 8');
				//executes the statement
				$st->execute(array('query' => "%{$query}%"));
				$result = $st->fetchAll(PDO::FETCH_ASSOC);
				//creates the result list
				$list = array();
				foreach ($result as $row)
					$list[] = "{$row['firstname']} {$row['lastname']}";
			}
			if (count($list) == 0)
				$response = array(
					'status' => false,
					'list' => array()
				);
			else
				$response = array(
					'status' => true,
					'list' => $list
				);
			//stores the result in session, so it can be used as cache
			$_SESSION[$query] = array(
				'timeout' => time(),
				'data' => $list
			);
		}
	} catch (Exception $e) {
		$response = array(
			'status' => false,
			'list' => array()
		);
	}
}
//outputs json response
header('Content-Type: application/json');
echo json_encode($response);
