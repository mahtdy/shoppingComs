<?php
$u=urldecode('https://www.aparat.com/search/%D8%A2%D9%85%D9%88%D8%B2%D8%B4_%D9%81%D8%A7%D8%B1%D8%B3%DB%8C_Redis');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$u);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
$cc = curl_exec($ch);
curl_close($ch);
//echo $cc;
$kkj="/.*/";
preg_match_all($kkj, $cc, $matt);
//print_r($matt);
$file41=fopen('aparat/s4.txt','w');
foreach ($matt[0] as $vall) {

    fwrite($file41, $vall."\n");
}
fclose($file41);
/////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$t=file_get_contents('aparat/s4.txt','r');
// echo $t;
$f=strstr($t,'<li  class="bg-ite');
$u=strstr($f,'/ul>');
$f=str_replace($u,'',$f);
echo $f;
$ttt=1;
//exit;
$file42=fopen('aparat/s5.txt', 'w');

while($ttt==1){
//	echo 'hi';
$ff=strstr($f,'<li  class="bg-item');
//$u=strstr($f,'/ul>');
//$f=str_replace($f,'',$u);
//    echo $ff;

//    $ff=strstr($f,' class="bg-item');
//    echo $ff;
		$i=1;
		$j=3;
		$d=array('');
		$dd='';
		$arr='li>';
		$fff=array('');
//		print_r($fff);
		while($dd!=$arr){

			$d='';
			$dd='';
			$fff[]=$ff[$i];
//			$wew=implode($fff);
//			wew            print_r($fff);
			$d[]=$ff[$j-2].$ff[$j-1].$ff[$j];
			$dd=implode($d);
//						echo $dd.'<br>';
				$i++;
				$j++;
//				if($dd==$arr)
//					echo 'sasasasas'.$dd;
		}
//echo 'masood';
//$f=strstr($f,'/li>');
//		echo $f;
//	print_r($fff);
	$fff1='';
$fff1=implode($fff);
//echo $fff1;
$f=str_replace($fff1, '', $f);
//echo $f;
//	if($fff1>''){
//		fwrite($file42, $fff1);
        fwrite($file42, $fff1."\n");

        if (strstr($f,'<li  class="bg-item')==false)
        	$ttt=0;

//	}
}
echo 'payan';
//
fclose($file42);
?>
