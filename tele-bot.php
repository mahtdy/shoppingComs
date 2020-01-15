<?php
$token='647051975:AAE2SwcVevfLza9EKYdx39TSQ1yCJK0MpNQ';
$url="https://api.telegram.org/bot".$token."/getUpdates";
$newupdate=file_get_contents($url);
$arrayResult=json_decode($newupdate,true);

print_r($arrayResult);
echo "salaam";

//https://api.telegram.org/bot<token>/METHOD_NAME