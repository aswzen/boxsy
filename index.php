<?php
require 'flight/Flight.php';
require 'flight/JsonResponse.php';

Flight::set('flight.base_url', 'http://192.16.100.2/boxsy');
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=boxsy','root',''));

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('/login', function(){
	header('Access-Control-Allow-Origin: *'); 
	header('Content-type: application/json');
	$db = Flight::db();
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$stmt = $db->prepare("select * from users where username = :username and password = :password");
	$stmt->execute( array(':username' => $_REQUEST['username'], ':password' => md5($_REQUEST['password'])) );
	$res = $stmt->fetch(PDO::FETCH_ASSOC);
	if(empty($res)){
		echo new JsonResponse(false, "Login Failed", null);
	} else {
		echo new JsonResponse(true, "Login Success", $res);
	}
});
Flight::start();
