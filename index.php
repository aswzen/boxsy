<?php
require 'flight/Flight.php';
require 'flight/JsonResponse.php';

session_start();

Flight::set('flight.base_url', Flight::request()->base.'/');
Flight::set('flight.www', Flight::request()->base.'/www/');

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=boxsy','root',''));

Flight::route('/', function(){
	if (isset($_SESSION['username'])){
		Flight::render('home', array('data' => array()));
	} else {
		Flight::render('index', array('data' => array()));
	}
});

Flight::route('/home', function(){
	if (isset($_SESSION['username'])){
		Flight::render('home', array('data' => array()));
	} else {
		Flight::render('index', array('data' => array()));
	}
});

Flight::route('/logout', function(){
	session_destroy(); 
	Flight::render('index', array('data' => array()));
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
		$_SESSION["username"] = $res['username'];
		echo new JsonResponse(true, "Login Success", $res);
	}
});

Flight::map('notFound', function(){
	Flight::render('index', array('data' => array()));
});

Flight::start();
