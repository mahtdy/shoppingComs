<?
$name=($_POST['name-family']);
echo 'nanyty='.$name;
//echo phpinfo();
//exit;
	include_once("sender.php");
	$url = 'http://bitpay.ir/payment-test/';
	$api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
	$trans_id = $_POST['trans_id']; 
	$id_get = $_POST['id_get'];
	echo 'idget='.$id_get;
	$result = get($url,$api,$trans_id,$id_get); 
	
	if($result == 1)
	{

	    echo 'trns='.$trans_id;
		print_r($result);echo '=true';//true
	}
	else
	{

        echo 'trns='.$trans_id;
        print_r($result);echo '=true';//true
		//false
	}

