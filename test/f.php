<?php

// $e="https://www.youtube.com";
// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL,$e);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch, CURLOPT_ENCODING ,"UTF-8");

// $headers[] = "Content-type: text/xml;charset=\"utf-8\"";
// //$headers[] = 'Content-length: 0';
//  $headers[]="Cache-Control: no-cache";
//             $headers[]="Pragma: no-cache";
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1');
// $r=curl_exec($ch);
// curl_close($ch);
// echo $r;
echo 'salam';
$url = 'https://www.youtube.com';
$proxy = '37.27.84.71:39024';
//$proxyauth = 'user:password';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$curl_scraped_page = curl_exec($ch);
$cc=curl_error($ch);

curl_close($ch);

echo $curl_scraped_page;
echo 'cc='.$cc;

?>