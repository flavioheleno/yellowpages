<?php

/*
	This script is responsible for add a new record to the database
*/

if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') { //request method MUST be a post
	//user input cleanup
	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_NUMBER_INT);
	//check if all the fields were filled
	if (($firstname == '') || ($lastname == '') || ($phonenumber == ''))
		$response = array(
			'status' => false,
			'msg' => 'Hey, what you think about filling all the fields? Can you try that for me?'
		);
	else {
		//handles international numbers (leading 00 => +)
		if (substr($phonenumber, 0, 2) == '00')
			$phonenumber = '+'.substr($phonenumber, 2);
		try {
			//database setup
			require_once __DIR__.'/db.class.php';
			$db = new DB(__DIR__.'/yellowpages.sqlite3');
			//prepare insert statement
			$st = $db->prepare('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (:firstname, :lastname, :phonenumber)');
			//data that will be inserted
			$data = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'phonenumber' => $phonenumber
			);
			//executes insert
			if ($st->execute($data))
				$response = array(
					'status' => true
				);
			else
				$response = array(
					'status' => false,
					'msg' => 'Errrr..the database is not willing to work now, let\'s try something else?'
				);
		} catch (Exception $e) {
			$response = array(
				'status' => false,
				'msg' => $e->getMessage()
			);
		}
	}
} else
	$response = array(
		'status' => false,
		'msg' => 'There was an error processing your request, can you please try again later? :\'('
	);
//outputs json response
header('Content-Type: application/json');
echo json_encode($response);
