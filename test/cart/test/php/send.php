<?






include_once("../../../../newcoms/Database.php");
include_once("../../../../newcoms/function.php");
include_once("../../../../newcoms/jdf.php");

$name = injection_replace($_POST['name']);
$list_list = injection_replace($_POST['list_list']);
$list_id= injection_replace($_POST['list_id']);
$name_family= injection_replace($_POST['name_family']);
$mobile = injection_replace($_POST['mobile']);
$address = injection_replace($_POST['address']);
$text = injection_replace($_POST['text']);
$offs = injection_replace($_POST['offs']);
$sum = injection_replace($_POST['sum']);

//print_r($list_list);
//exit;

if ($image != -1) {
    $cart_arr = array("id_product" => $list_id,"tedad_product" => $list_list, "name" => $name_family, "address" => $address, "mobile" => $mobile, "text" => $text);
    insert_to_data_base($cart_arr, 'new_cart', $coms_conect);
}

//$post_post=$_POST;

//$name=($_POST['name-family']);
//$list_list=($_POST['list_list']);
//echo 'nan='.$name;
//print_r($list_list);
//print_r($post_post);
//echo phpinfo();
//exit;



	include_once("sender.php");
	
	$url = 'http://bitpay.ir/payment-test/gateway-send';
	$api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
	$amount = 1000;
	$redirect = 'http://localhost/pay/fa';
	$name = '';
	$email = '';
	$description = '';
	$factorId = 20;
	
	$result = send($url,$api,$amount,$redirect,$factorId,$name,$email,$description);
print_r($result);

if($result > 0 && is_numeric($result))
	{
		print_r($result);
		$go = "http://bitpay.ir/payment-test/gateway-$result";
		header("Location: $go");
	} 

