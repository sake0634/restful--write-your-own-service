<?php
include_once 'functions.php';
//process client request (via url)
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

  
if(!empty($_GET['name']))
{
	//
	$name= $_GET['name'];
	$price = get_price($name);
	
	if(empty($price))
	{
		deliver_response(200, "price not found", null);
	}else
	{
		deliver_response(100, "price found", $price);
	}
}else
{
	deliver_response(404, "invalid request", null);
}

function deliver_response($status, $status_message, $data)
{

	header("HTTP/1.1 $status $status_message");
	header("Access-Control-Allow-Origin: *");  
	$response['status'] = $status;
	$response['status_message']= $status_message;
	$response['data'] = $data;
	
	$json_response= json_encode($response);
	
	echo $json_response;

}


?>