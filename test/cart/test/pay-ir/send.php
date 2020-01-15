<?php
$list_list=($_POST['list_list']);

include_once("functions.php");
$api = 'test';
$amount = "12000";
$mobile = "MobileNumber (optional)";
$factorNumber = "FactorNumber (optional)";
$description = "Description (optional)";
$redirect = 'http://localhost/pay/fa';
$result = send($api, $amount, $redirect, $mobile, $factorNumber, $description);
$result = json_decode($result);
if($result->status) {
	$go = "https://pay.ir/pg/$result->token";
	header("Location: $go");
} else {
	echo $result->errorMessage;
}