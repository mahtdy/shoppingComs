<?include_once("newcoms/function.php");
@session_start();
include_once("languages/fa.php");
 if(isset($_SESSION['page_languege']))
include("languages/{$_SESSION['page_languege']}.php"); 


$value=injection_replace($_POST['value']);
 $id=injection_replace($_POST['id']); 
if($_POST['action']=='send_member_sms_code'){
    $query="SELECT sms_value,user_name,question from new_members where mobile='$id'";
 	$result = $coms_conect->query($query); 
    $row = $result->fetch_assoc();
    if($row['sms_value']==$value&&$row['sms_value']>""&&$row['question']>""){
		$_SESSION['answer_member_qestion']=$row['user_name'];
		echo 1;      
    }else if($row['sms_value']==$value&&$row['question']==""){
		$temp= create_member_reset_password($row['user_name']);
		$condition="user_name='{$row['user_name']}'";
		$arr_slide=array("email_link"=>$temp);
		update_data_base($arr_slide,'new_members',$condition,$coms_conect);
		echo $temp;
	}else 
        echo 0;
}
$time=time(); 
include_once("newcoms/Database.php");
include_once("newcoms/jdf.php");
 $domain_name= $_SERVER["HTTP_HOST"] ;
$custom_ip=$_SERVER['REMOTE_ADDR'];
$now=time();
$can_add=$_SESSION["can_add"];
$action=injection_replace($_POST['action']);
$secend_value=injection_replace($_POST['secend_value']);


$state=injection_replace($_POST['state']);
$pic=injection_replace($_POST['pic']);
$product_type=injection_replace($_POST['product_type']);
$ads_filter=injection_replace($_POST['ads_filter']);
$cat=injection_replace($_POST['cat']);

 

  if($action=='send_maanger_code'){
      $query="SELECT sms_value,user_name from new_managers where mobile='$id'";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      if($row['sms_value']==$value){
        $_SESSION['answer_qestion']=$row['user_name'];
        echo 1;      
      }else 
         show_msg_warninig($view_code_incorrect);
  }
  
 
if($action=='add_newsletters'){  
   $newsletter_value=get_result("select count(id) from new_newsletters where la='$secend_value' and site='$value' and email='$id'",$coms_conect);
  if($newsletter_value>0)
	  echo 'این ایمیل وجود دارد';
  else{
	$arr=array("email"=>$id,"ip"=>$custom_ip,"date"=>time(),"site"=>$value,"la"=>$secend_value);
	$id=insert_to_data_base($arr,'new_newsletters',$coms_conect);  
	echo 'ایمیل شما با موفقیت ثبت شد' ;
  }
} 
 
 
if($action=='update_member_information'){
	$password=injection_replace($_POST['pass_p']);
	$new_pass=injection_replace($_POST['new_pass_p']);
	$url=injection_replace($_POST['url_p']);
	$pagename=injection_replace($_POST['pagename_p']);
	$about_page=injection_replace($_POST['about_p']);
	$pass_flag=0;
	$temp_password==get_result("select password from new_members where id='{$_SESSION["new_userid"]}'",$coms_conect);
	if($password==''){
		$password==$temp_password;
	}else{
		$user_password=create_memebre_password($_SESSION["new_okusername"],$password);
		if($temp_password==$user_password)
			$password=create_memebre_password($_SESSION["new_okusername"],$new_pass);
		else 
		$pass_flag=1;	
					
	}
	$condition="id={$_SESSION["new_userid"]}";
	$arr_slide=array("password"=>$password,"url"=>$url,"pagename"=>$pagename,"about_page"=>$about_page);
	if($pass_flag==0){
	update_data_base($arr_slide,'new_members',$condition,$coms_conect);
		echo  '<ul style="list-style: none;" class="alert alert-success rtl">
					<li>'.$view_edit_information.'</li>
				</ul>'; 
	}
	else
		echo  '<ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_previous_password_incorrect.'</li>
				</ul>'; 

 }
if($action=='update_member_social'){
	print_r($_POST);
	$instagram=injection_replace($_POST['instagram']);
	$youtube=injection_replace($_POST['youtube']);
	$facebook=injection_replace($_POST['facebook']);
	$twiter=injection_replace($_POST['twiter']);
	$telegram=injection_replace($_POST['telegram']);
	$condition="id={$_SESSION["new_userid"]}";
	$arr_slide=array("instagram"=>$instagram,"youtube"=>$youtube,"facebook"=>$facebook,"twiter"=>$twiter,"telegram"=>$telegram);
	update_data_base($arr_slide,'new_members',$condition,$coms_conect);
		echo  '<ul style="list-style: none;" class="alert alert-success rtl">
					<li>'.$view_edit_information.'</li>
				</ul>'; 
}

 
 
 
if($action=='show_ads_delicated'){
	$cat_id=$id;
	$query="SELECT name,value,id,type from new_ads_delicated_cat where cat_id='$id' and status=1";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		$edit_value='';
		$type0_count=0;
		$type1_count=0;
		$type=$row['type'];
		$id=$row['id'];
		if($value>0)
		$edit_value=get_result("select value from new_ads_delicated_values where ads_id=$value and delicated_id=$id",$coms_conect);
		echo '<div class="form-group">
				<label class="control-label">'.$row['name'].'</label>
				<div class="col-md-12 form-group">';
		 if($type==0){
			echo "<input class='form-control' value='$edit_value' name='delicated_text$id'>";$type0_count++;
		}
		else if($type==1){
		 
			echo "<select class='form-control' name='delicated_select$id'>>";
			$result11 = $coms_conect->query("select id,value from new_ads_delicated_cat_val where delicated_id=$id and cat_id=$cat_id  and status=1");
			while($row11 = $result11->fetch_assoc()){
				$str='';
				if($edit_value==$row11['id'])
				$str='selected';
				echo "<option $str value='{$row11['id']}'>{$row11['value']}</option>";
			}
			echo "<select>";$type1_count++;
		}
		echo '</div>
			</div>';;
	}
 
}

if($action=='show_request_li'){
	$request_status=$id;
	if($id==0){
		$request_status_str=$view_all_requests;
		$request_div_open='allreq';
	}else if($id==1){
		$request_status_str=$view_open_requests;
		$request_div_open='openreq';
	}else if($id==2){
		$request_status_str=$view_pending_requests;
		$request_div_open='checkreq';
	
	}else if($id==3){
		$request_status_str=$view_closed_requests;
		$request_div_open='closereq';
	}
  	include 'new_dynamics\default\profile\request_list.php4';
}
 


if($action=='show_ads_li'){
	$ads_status=$id;
	include 'new_dynamics\default\profile\all_ads.php4';
  
} 
 






if($action=='search_ticket'){
	?>
		<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
				 	<th><?=$view_num_request?></th>
					<th><?=$view_sent_date?></th>
					<th><?=$view_title_request?></th>
					<th><?=$view_unit?></th>
					<th><?=$view_actions?></th>
				</tr>
			</thead>

			<tbody>
			<?if($id==0)
				$str_status='';
			else
				$str_status="and a.status=$id";
			$sql1 = "select count(a.id)as cnt from new_ticket a,new_ticket_department b,new_ticket_answer c    where 
			c.ticket_id=a.id and (c.text like '%$value%' or  b.name like '%$value%' or a.ticket_subject like '%$value%' or ticket_description like '%$value%' )  and	b.id=a.ticket_department and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' $str_status";
			//echo $sql1;
			$result = $coms_conect->query($sql1);
			$RS = $result->fetch_assoc();
	 		$page=injection_replace($_GET["page"]);
			$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_newstext$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
			$from=$a[0];
			$to=$a[1];
			$pgsel=$a[2];
			$query="SELECT a.la,a.id,a.date,a.ticket_subject,b.name from new_ticket a,new_ticket_department b,new_ticket_answer c    where
			c.ticket_id=a.id and (c.text like '%$value%' or  b.name like '%$value%' or a.ticket_subject like '%$value%' or ticket_description like '%$value%' )  and	b.id=a.ticket_department and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' $str_status group by c.ticket_id order by a.id desc LIMIT $from,$to";
			// echo $query;
			$result = $coms_conect->query($query);
			while($RS1 = $result->fetch_assoc()){?>
				<tr>
					 
					<td><a href="/<?="profile/{$RS1['la']}/ticket/show/{$RS1['id']}"?>"><?=$RS1["id"]?></a></td>
					<td><?=miladitojalaliuser(date('Y-m-d',$RS1['date']));?></td>
					<td><?=$RS1['ticket_subject']?></td>
					<td><?=$RS1['name']?></td>
					<td><a href="/<?="profile/{$RS1['la']}/ticket/show/{$RS1['id']}"?>" class="btn btn-info showview" href=""><?=$view_view?></a></td>
				</tr>
			<?}?>
			</tbody>
		</table>
		<?=$pgsel?>		
<?}


if($action=='add_contact_us_pm'){ 
//echo $_SESSION["code"] 
	if($_SESSION['add_contact_us_pm']==2){
				echo  ' <ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_pre_message_sent.'</li>
				</ul>'; 
	}else{
		if($_SESSION["code"]==$_POST["comment_captcha"]){
			$comment_id=time();
			if(isset($_POST['name'])){
			$name=injection_replace($_POST["name"]);
				$email=injection_replace($_POST["email"]);
				$subject=injection_replace($_POST["subject"]);
				$user=injection_replace($_POST["user"]);
				$mobile=injection_replace($_POST["mobile"]);
				$emailto=$user;
				$topic=injection_replace($_POST["topic"]);
				$message=htmlspecialchars($_POST["message"]);
				$temp=$_SERVER['SERVER_NAME'];
				$msg ="<div style='text-align:right;font-family:tahoma;'>";
				$msg .= $view_site_name.": ".$temp ."<br> ";
				$msg .= $view_message_information." <br> ";
				$msg .= $view_name.": $name  <br> ";
				$msg .= $view_mobile.":  $mobile  <br> ";
				$msg .= $view_email.":  $email  <br>";
				$msg .= $view_subject.":  $subject   <br>" .$view_message.":  $message <br>";
				$msg .='</div>';
				$sql="select email,user_id from new_contact_us where id='$user'";
				$result = $coms_conect->query($sql);
				$row = $result->fetch_assoc();
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From:  $temp noreply@$temp ";
			     yepmail($row['email'],"$view_new_message - $subject",$msg,$headers);	
				$arr_attach=array("subject"=>$subject,"mobile"=>$mobile,"name"=>$name,"email"=>$email,"text"=>$message,"user_id"=>$row['user_id'],"date"=>time(),"la"=>$_SESSION['la'],"site"=>$_SESSION['site'],"ip"=>$custom_ip);
				insert_to_data_base($arr_attach,'new_contactus_pm',$coms_conect);
			echo ' <ul style="list-style: none;" class="alert alert-success rtl">
					<li>'.$view_sent_message.'</li>
				</ul>';
			$_SESSION['add_contact_us_pm']=2;
			}
		}else if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]!=$_POST["comment_captcha"]){
			echo  ' <ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_incorrect_captcha.'</li>
				</ul>';
		} 
	}
} 

if($action=='ads_search_filter'){
 $temp=explode(",",$product_type);
 $flag=0;$pic_flag=0;$pic=-1;
 if(in_array(0,$temp)){
 $product_type="and a.product_type=0";$falg++;}
 if(in_array(1,$temp)){
 $product_type="and a.product_type=1";$falg++;}	

 if($falg==2)
	$product_type='';

 

 if(in_array(3,$temp)){
 $pic=1;$pic_flag++;}
 if(in_array(2,$temp)){
 $pic=0;$pic_flag++;}	
 
	if($pic_flag==2)
	$pic=2;
	
	 
	
	if($state)
	 $str_state=" and b.id=$state ";

 	if($ads_filter==1)
	 $str_ads_filter=" order by a.id desc"; 
 	if($ads_filter==2)
	 $str_ads_filter=" order by a.price desc"; 
  	if($ads_filter==3)
	 $str_ads_filter=" order by a.price";
 if($secend_value=='')
	 $secend_value=0;

	$query1="select b.name,a.date,a.la,a.title,a.id,a.price from new_ads a,new_regional b,new_modules_catogory c
			where  site='{$_SESSION['site']}' and a.state=b.id and
			c.type=18 and a.id=c.page_id  
			and la='{$_SESSION['la']}' and status=1   and publish_date<='$now'
									$str_state    $product_type 
									group by a.id  $str_ads_filter  limit  $secend_value,9";
									//echo $query1;
										$result1 = $coms_conect->query($query1);
									   //echo $query1; 
									echo '<ul class="pl0 gridshow">';
										while($row1 = $result1->fetch_assoc()) {
											$pic_adress=get_result("select adress from new_file_path where type=18 and id={$row1['id']} and name='ads_galery_pic'",$coms_conect);
											if($pic==2||$pic==-1){
												$pic_condison=true;
											}												
										if($pic_condison||($pic==1&&$pic_adress)||($pic==0&&$pic_adress=='')){	
													?>
                                                <!----------------------- item ----------------------->
                                                <li class="col-md-4 col-sm-6 col-xs-12 griditem animated fadeIn">
                                                    <div class="adsitem">
                                                       
                                                        <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>">
														<img src="<?=get_modual_pic_address($pic_adress,$site,$domain,18)?>" alt="<?=$row1['title']?>"></a>
                                                        <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>"><h3><?=$row1['title']?></h3></a>

                                                        <div class="row">
                                                            <div class="col-xs-12 location pull-right rtl"><span
                                                                    class="fa fa-map-marker"></span><span><?=$row1['name']?></span>
                                                            </div>
                                                            <div class="col-xs-6 date pull-right rtl"><span
                                                                    class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$row1['date']));?></span>
                                                            </div>
                                                            <div class="col-xs-6 price pull-left">
                                                                <span><?if($row1['price']=='')echo $view_Agreement ;else echo $row1['price'];?></span></div>
                                                        </div>


                                                    </div>
                                                </li>

                                                <li class="col-md-4 col-sm-6 col-xs-12 listitem animated fadeIn">
                                                    <div class="adsitem row">
                                                        <button class="star"><i class="fa fa-star-o"></i></button>
                                                        <div class="col-sm-3 col-xs-12 pull-right rtl pr0">
                                                            <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>">
															<img src="<?=get_modual_pic_address($pic_adress,$site,$domain,18)?>" alt="<?=$row1['title']?>"></a>
                                                        </div>
                                                        <div class="col-sm-9 col-xs-12  pull-right rtl">
                                                            <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>"><h3><?=$row1['title']?></h3></a>

                                                            <div class="row">
                                                                <div class="col-xs-12 location pull-right"><span
                                                                        class="fa fa-map-marker"></span><span><?=$row1['name']?></span>
                                                                </div>
                                                                <div class="col-xs-12 date pull-right"><span
                                                                        class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$row1['date']));?></span>
                                                                </div>
                                                                <div class="col-xs-12 price pull-right">
                                                                    <span><?if($row1['price']=='')echo $view_Agreement ;else echo $row1['price'];?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
										<?}} echo '</ul>';
	  
exit;}


 







  if($action=='download_download'){
		$query="select title,adress from new_modual_links where modual_id='$id' and type=6";
		$result = $coms_conect->query($query);$i=1;
		echo '<table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>'.$view_row.'</th>
                                    <th>'.$view_subject.' </th>
                                    <th>'.$view_recieve.'</th>
                                </tr>
                                </thead>
                                <tbody>';
		 while($RS1 = $result->fetch_assoc()) {
			
                                echo '<tr>
                                    <th class="text-center" scope="row">'.$i.'</th>
                                    <td>'.$RS1['title'].'</td>
                                    <td class="text-center"><a href="'.$RS1['adress'].'"><span class="fa fa-cloud-download"></span></a></td>
                                </tr>';$i++;
                              
		}
		echo '  </tbody>
                            </table>';
  }

  if($action=='download_article'){
		$query="select auto_number,adress from new_file_path where id='$id' and type=7 and name='articles'";
		//echo $query;
		$result = $coms_conect->query($query);$i=1;
		 while($RS1 = $result->fetch_assoc()) {
		
		$temp=explode("/source/",$RS1['adress']);
		$file='/source/'.$temp[1];
			echo '<table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>'.$view_row.'</th>
                                    <th>'.$view_subject_file.'</th>
                                    <th>'.$view_recieve.'</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="text-center" scope="row">'.$i.'</th>
                                    <td>'.$RS1['adress'].'</td>
                                    <td class="text-center"><a href="'.$file.'" download="newfilename"><span class="fa fa-cloud-download"></span></a></td>
                                </tr>
                                </tbody>
                            </table>';
		}
  }


if($action=='check_users'){
	if(get_result("select count(id) as count from new_managers where user_name='$id'",$coms_conect)==0&&get_result("select count(id) as count from new_members where user_name='$id'",$coms_conect)==0)
	echo  0;else
		echo 1;
}
if($action=='check_user_email'){
   echo   get_result("select count(id) as count from new_members where email='$id'",$coms_conect);
}
if($action=='check_user_mobile'){
    echo   get_result("select count(id) as count from new_members where mobile='$id'",$coms_conect);
}



if($action=='show_relate_gallery_ajax'){
 
	 if($value<6){
		
		$value=6-$value;
		$sql120 = "SELECT a.la,a.album_type,a.id,a.title,a.mudoal_lock from new_gallery a ,new_modules_catogory c   
		where c.page_id=a.id and  c.type=9 and a.id<>$id and  c.cat_id=$secend_value    and status=1
		order by a.id desc limit 0,$value";
	 
		$resultd10 = $coms_conect->query($sql120);
		while($row10 = $resultd10->fetch_assoc()) {	
		
		$sql1w1="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row10['id']}";	
		$result1q = $coms_conect->query($sql1w1);
		$roww1 = $result1q->fetch_assoc();
		
		?>
		<div class="item">
			<a class = "hvr-glow" href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>">
				<img class = "lazyOwl hvr-glow" src="<?=get_gallery_thumbnail($roww1['adress'],$row10['album_type'])?>" alt="<?=$row12['title']?>" width="300" height="200">
			 </a>
			<a href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>" class="desc"><?=$row10['title']?></a>
		</div>	
	<?}
	} 	
}

if($action=='show_pic_pagin_ajax'){
	$sql12 = "SELECT a.album_type,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b   
	where id>0 and a.id=b.page_id and b.type=9 and site='$id' and a.la='{$_SESSION['la']}' and publish_date<=$now
	group by b.page_id
	order by a.id desc limit  $secend_value,9";
	//  echo $sql12;//exit;
	$resultd1 = $coms_conect->query($sql12);
	while($row = $resultd1->fetch_assoc()) {
		$sql11="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row['id']}";	
		$result1 = $coms_conect->query($sql11);
		$row1 = $result1->fetch_assoc();?> 
		
				<div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
					<div class="item">
						<a href="/gallery/<?=$row['la']?>/<?=$row['id'].'/'.insert_dash($row['title'])?>">
						<figure>
							<img class = "hvr-glow" src="<?=get_gallery_thumbnail($row1['adress'],$row['album_type'])?>" alt="<?=$row['title']?>">
							<p><h2><?=$row['title']?></h2></p>
						</figure>
						</a>
					</div>
				</div>
			
	<?}
exit;} 

  if($action=='add_to_favorite'){
		$sql2="select count(id) count from new_favorite where url='$id' and user_name='{$_SESSION["new_okusername"]}'";
		$result2 = $coms_conect->query($sql2);
		$row1 = $result2->fetch_assoc();
 
     if($row1['count'] > 0){
	     $condition1="url='$id'";
        delete_from_data_base('new_favorite',$condition1,$coms_conect);
		echo 0;
	 }else if($_SESSION["new_okusername"]>""){
      $query1="insert into new_favorite(user_name,url,date) 
      values ('{$_SESSION["new_okusername"]}','$id',$time)";
      $coms_conect->query($query1);
	  echo 1;
	
  }
}

 
if($action=='show_faq_pagin_ajax'){
 	if($id)
		$faq_str="and  a.question like '%$id%'";
	if($value>0)
		$faq_str1="and  a.cat_id=$value ";
	$sql12 = "SELECT a.answer,a.question,a.id,a.status   from new_faq  a,new_faq_cat b  
	where a.id>0 and a.status=1 and a.cat_id=b.id  
	$faq_str1
	and a.site='{$_SESSION['site']}' and a.la='{$_SESSION['la']}' $faq_str 
	order by a.id desc limit  $secend_value,10";
 
	$resultd1 = $coms_conect->query($sql12);$i=1;
			while($row = $resultd1->fetch_assoc()) {
				$id=$row['id'];?> 
				<li><a target='_blank' id='<?$row['id']?>' href="<?="/faq/$defult_lang/$id/".insert_dash($row['question'])?>"><?=$row['question']?></a></li>
			<?}	
exit;} 


if($action=='show_q_n_pagin_ajax'){
 	if($id)
		$faq_str="and  a.question like '%$id%'";
	if($value>0)
		$faq_str1="and  a.cat_id=$value ";
	$sql12 = "SELECT a.answer,a.question,a.id,a.status   from new_faq  a,new_faq_cat b  
	where a.id>0 and a.status=1 and a.cat_id=b.id  
	$faq_str1
	and a.site='{$_SESSION['site']}' and a.la='{$_SESSION['la']}' $faq_str 
	order by a.id desc limit  $secend_value,10";
 
	$resultd1 = $coms_conect->query($sql12);$i=1;
			while($row = $resultd1->fetch_assoc()) {
				$id=$row['id'];?> 
				<li><a target='_blank' id='<?$row['id']?>' href="<?="/q_n/$defult_lang/$id/".insert_dash($row['question'])?>"><?=$row['question']?></a></li>
			<?}	
exit;} 

 
if($action=='show_videos_pagin_ajax'){
	$cat_str='';
	if($value>0) 
		$cat_str=" and b.cat_id=$value";
	$sql12 = "SELECT a.duration,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_video a,new_modules_catogory b   
	where id>0  $cat_str and a.id=b.page_id and b.type=8 and site='$id'
	group by b.page_id 
	order by a.id desc limit  $secend_value,9"; 
	// echo $sql12; 
	$resultd1 = $coms_conect->query($sql12);
	while($row = $resultd1->fetch_assoc()) { 
 		?>  
		<div class="sss col-md-4 col-sm-6 col-xs-12 pull-right oh">
			<div class="item">
			  <a href="/video/fa/<?=$row['id'].'/'.insert_dash($row['title'])?>"> 
			  <figure> 
			  <img src="<?=get_modual_address($row['id'],$coms_conect)?>" alt="<?=$row['title']?>"> 
			   <h5 class="video-duration"><?=$row['duration']?></h5>
								   <p class="text-length"><?=$row['title']?>
				<div class="playerbt"><span class="fa fa-youtube-play"></span>
											<?if($row['mudoal_lock']==1){?>
									<span class="fa fa-lock"></span>
									<?}?>
				</div>
				</figure>
					</a>
			</div>
		</div>
	<?}
exit;}  

if($action=='search_videos_pagin_ajax'){
	$sql12 = $_SESSION['search_sql']." limit  $secend_value,9"; 
	$resultd1 = $coms_conect->query($sql12);
	while($row = $resultd1->fetch_assoc()) {
		$sql11="select adress from new_file_path where type=8 and name='video_videos' and id ={$row['id']}";	
		$result1 = $coms_conect->query($sql11);
		$row1 = $result1->fetch_assoc();
		?>  
		<div class="sss col-md-4 col-sm-6 col-xs-12 pull-right oh">
			<div class="item">
			  <a href="/video/fa/<?=$row['id'].'/'.insert_dash($row['title'])?>">
			  <figure>
			  <img src="<?=get_modual_address($row['id'],$coms_conect)?>" alt="<?=$row['title']?>"> 
			  <p><?=$row['title']?></p>
			    <h5 class="video-duration"><?=$row['duration']?></h5>
				<div class="playerbt"><span class="glyphicon glyphicon-play-circle"></span>
				</div>
					</figure>
					</a>
			</div>
		</div>
	<?}
exit;} 

if($action=='search_gallery_pagin_ajax'){
	$sql12 = $_SESSION['search_sql']." limit  $secend_value,9"; 
	$resultd1 = $coms_conect->query($sql12);
	while($row = $resultd1->fetch_assoc()) {
		$sql11="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row['id']}";	
		$result1 = $coms_conect->query($sql11);
		$row1 = $result1->fetch_assoc();
		?>  
		<div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
			<div class="item">
			  <a href="/video/fa/<?=$row['id'].'/'.insert_dash($row['title'])?>">
			  <figure>
			  <img src="<?=get_gallery_thumbnail($row1['adress'],$row['album_type'])?>" alt="<?=$row['title']?>">
			  <p><?=$row['title']?></p>
				<div class="playerbt"><span class="glyphicon glyphicon-play-circle"></span>
				</div>
					</figure>
					</a>
			</div>
		</div>
	<?}
exit;}

if($action=='show_blog_pagin_ajax'){
	$sql128 = "SELECT b.cat_id,a.abstract,a.date,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_blog a,new_modules_catogory b   
	where id>0 and a.id=b.page_id and b.type=10 and site='$id'
	group by b.page_id
	order by a.id desc limit $secend_value,9";
	// echo $sql128;
	$resultd18 = $coms_conect->query($sql128);
		while($row8 = $resultd18->fetch_assoc()) {
			$sql118="select adress from new_file_path where type=10 and name='blog_image' and id ={$row8['id']}";	
			$result18 = $coms_conect->query($sql118);
			$row18 = $result18->fetch_assoc();
			$temp=urlencode($row8['title']); 
											?> 
                                            <div class="col-xs-12 item">
                                               <a href='/blog/<?=$row8['la'].'/category/'.$row8['cat_id']?>'><p class="bcat"><span><?=get_result("select name from new_modules_cat where id={$row8['cat_id']}",$coms_conect)?></span></p></a>
                                                <a href="#"><h3><?=$row8['title']?></h3></a>
                                                <p class="info">
                                                    <!--span class="fa fa-user"></span><span>نام نويسنده</span-->
                                                    <span class="fa fa-clock-o"></span><span><?=miladitojalalidefult(date('Y-m-d H:i:m',$row8['date']));?></span>
                                                    <span class="fa fa-eye"></span><span><?=$row8['view']?></span>
                                                </p>
												 <?if($row18['adress']){?>
													<a href="/blog/<?=$row8['la'].'/'.$row8['id'].'/'.insert_dash($row8['title'])?>"><img src="<?=$row18['adress']?>" alt="<?=$row8['title']?>"/></a>
												 <?}?>
                                                <p class="kholase"><?=$row8['abstract']?></p>
                                               <div class="sociallinks">
                                                    <ul>
												<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin-square"></span></a>
												<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
												<a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus-square"></span></a>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
                                                    </ul>
                                                </div> 
                                                <div class="more">
                                                    <button onclick="window.location='/blog/<?=$row8['la'].'/'.$row8['id'].'/'.insert_dash($row8['title'])?>'" class="btn btn-info"><?=$view_more?></button>
                                                    <hr/>
                                                </div>
                                            </div>
<?}exit; }


if($action=='download_video_count'){
$query1="update new_video set down_count=1+down_count where id='$id'"; 
echo $query1;
$coms_conect->query($query1);
}  
  
if($action=='change_q_a_cat'&&$_SESSION["edit_item"]=='change_q_a_cat_show'){
	 
	if($id!=0)
	$str=" and cat_id=$id";	
	$sql12 = "SELECT a.answer,a.question,a.id,a.status   from new_q_a  a,new_q_a_cat b  
	where a.id>0 and a.status=1 and a.cat_id=b.id  $str and a.site='{$_SESSION['site']}' and a.la='{$_SESSION['la']}' $faq_str 
	order by a.id desc limit 0,10";
	 
	$resultd1 = $coms_conect->query($sql12); 
	echo ' <ul class="faqitems ">';
	while($row = $resultd1->fetch_assoc()) {
	$id=$row['id'];	?> 
				<li><a id='<?=$row['id']?>'  href="<?="/q_a/{$_SESSION['la']}/{$row['id']}/".insert_dash($row['question'])?>"><?=$row['question']?></a></li>
	<?}
	echo '</ul>';
exit;}   
  
  
  if($action=='send_again_sms'){
    if($_SESSION["new_usersendsms_count"]>=5)
      echo 0;
    else{
      $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $url=$row['url'];
      $sms_password=$row['sms_password'];
      $sms_user=$row['sms_user'];
      $senderNumbers=array($row['senderNumbers']);
      $sendDate=array(time());
      $str=rand(100000,10000000);
      $_SESSION["new_smsvalue"]=$str;
      $recipientNumbers=array($_SESSION["new_usermobile"]);
	  $sms_str="کد تایید و بررسی موبایل : $str
			نام سایت : {$_SERVER['SERVER_NAME']}";
      $messageBodies=array($sms_str);
      $sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
      if($sms==1){
        $_SESSION["new_usersendsms_count"]++;
        $query1="update new_members set sms_value='$str' where user_name='$id'"; 
	    $coms_conect->query($query1);
        echo 1;
      }
    }
    
  }
  
  if($action=='send_member_sms'){
      $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $url=$row['url'];
      $sms_password=$row['sms_password'];
      $sms_user=$row['sms_user'];
      $senderNumbers=array($row['senderNumbers']);
      $sendDate=array(time());
      $str=rand(100000,10000000);
      $_SESSION["new_smsvalue"]=$str;
      $recipientNumbers=array($id);
      $messageBodies=array($str);
      $query="SELECT mobile,id from new_members where mobile='$id'";
       $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $mobile=$row['mobile'];
      $user_id=$row['id'];
      if($mobile==$id){
        $sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
        if($sms==1){
          $_SESSION["new_usersendsms_count"]++;
          $query1="update new_members set sms_value='$str' where id='$user_id'"; 
          $coms_conect->query($query1);
		  echo '<br><div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                   <input class="form-control" id="code_number" type=" " placeholder='.$view_enter_code.'></input>
               </div><br>
               <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                    <a id="send_memeber_code" class="btn btn-primary fullwidth">'.$view_send.'</a>
              </div>';
        } else  show_msg_warninig(sms_alert($sms)); 
      }else
	  show_msg_warninig($view_number_not_exist);
    }
	
	
  if($action=='send_maanger_sms'){
      $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $url=$row['url'];
      $sms_password=$row['sms_password'];
      $sms_user=$row['sms_user'];
      $senderNumbers=array($row['senderNumbers']);
      $sendDate=array(time());  
      $str=rand(100000,10000000);
      $_SESSION["new_smsvalue"]=$str;
      $recipientNumbers=array($id);
	  $send_str='کد صحت سنجی بازیابی کلمه عبور'.$str."
	  $domain_name";
	  
 
      $messageBodies=array($send_str);
      $query="SELECT mobile,id from new_managers where mobile='$id'";
       $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $mobile=$row['mobile'];
      $user_id=$row['id'];
      if($mobile==$id){
        $sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$user_id);
        if($sms==1){
          $_SESSION["new_usersendsms_count"]++;
          $query1="update new_managers set sms_value='$str' where id='$user_id'"; 
          $coms_conect->query($query1);
		  echo '<br><div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                   <input class="form-control" id="code_number" type=" " placeholder="'.$view_enter_code.'"></input>
               </div><br>
               <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                    <button id="send_code" type="button" class="btn btn-primary fullwidth">'.$view_send.'</button>
              </div>~';exit;
        } else  echo '~';
			show_msg_warninig(sms_alert($sms)); 
      }else{
		   echo '~';
			show_msg_warninig($view_number_not_exist);
	  }
    }	
	
	
	
  if($action=='send_maanger_email'&&$_SESSION['user_type']!='member'){
	 
	  $query="SELECT answer,question,email,id,user_id,user_name,name from new_managers where email='$id'";
      // echo $query;exit;
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $email=$row['email'];
      $name=$row['name'];
    
      $user_id=$row['id'];
      $user_name=$row['user_name'];
	  $str=create_reset_password($row['user_name']);
	 
      if($email==$id && $value==''){
			   echo $row['question'].'~';exit; 
	  } else   if($email==$id && $value>''){
		  if($row['answer']==$value){
			$query1="update new_managers set email_link='$str' where id='$user_id'"; 
			$coms_conect->query($query1);
			
			$headers= 'MIME-Version: 1.0' . "\r\n";
			$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
			$text="<div  style='text-align:right;font-family:tahoma;'>";
			  $text  .="<p>$view_dear_friend $name </p>
			  <p style='text-align:right'>  $user_name : $view_your_username </p>
			  <p>$view_longtext3 </p>
			  <p><a target='_blank' href='{$_SERVER['HTTP_HOST']}/new_change_password.php?val=$str'>$view_change_password2</a><p> 
			  <p>$view_longtext4</p>
			  <p><a target='_blank' href='{$_SERVER['HTTP_HOST']}/new_change_password.php?val=$str'>{$_SERVER['HTTP_HOST']}/new_change_password.php?val=$str</a><p>";
			  $text .="</div>";
					$to = $email;
			$subject = "$view_link_change_password";
			$temp=$_SERVER['SERVER_NAME'];
			$headers .= "From:  $temp noreply@$temp ";
			$arr_video=array("date"=>time(),"manager_id"=>$user_id,"email"=>$email,"text"=>"<p> $view_send_link_change_password</p>");
			insert_to_data_base($arr_video,'new_email_archive',$coms_conect); 
			 
			  echo '~<div class="alert yepalert yepalert-success " style="position: fixed;">
				  <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
				  <strong>'.$view_longtext1.'</strong>
				  <br>
				  <strong style="color:red;">'.$view_longtext2.'</strong>
				</div>';
 
			 yepmail($to,$subject,$text,$headers);exit;  
		  }else{
			      echo $row['question'].'~';
			  show_msg_warninig($view_incorrect_reply);
			  exit;
		  }
      }else{
		  echo '~';
	  show_msg_warninig($view_email_not_exist);
	  }
	
 }	
	
  if($action=='send_member_email'){
	 
      $query="SELECT name,family,email,id,user_name,question,answer from new_members where email='$id'";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $email=$row['email'];
      $user_id=$row['id'];
	  $str=create_member_reset_password($row['user_name']);
			
      if($email==$id && $value==''&&$row['question']>""){
			   echo $row['question'].'~';exit; 
	  } else   if(($email==$id && $value>'')||($email==$id && $row['question']=='')){
		   if($row['answer']==$value||$row['question']==''){
			$temp=$_SERVER['SERVER_NAME'];	
			$query1="update new_members set email_link='$str' where id='$user_id'"; 
			$coms_conect->query($query1);
			$headers=$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
			$text="<div  style='text-align:right;font-family:tahoma;'>";
			$text  .="<p>  $view_dear_friend : {$row['name']} {$row['family']} </p>";   
			$text  .="<p>{$row['user_name']} : $seramic_username  </p>
			<p>$view_longtext15</p>
			<p><a target='_blank' href={$_SERVER['HTTP_HOST']}/new_member_change_password.php?la={$_SESSION['la']}&val=$str>$view_change_password2</a><p> 
			<p>$view_link_change_password</p>
			<p><a target='_blank' href={$_SERVER['HTTP_HOST']}/new_member_change_password.php?la={$_SESSION['la']}&val=$str>{$_SERVER['HTTP_HOST']}/new_member_change_password.php?la={$_SESSION['la']}&val=$str</a><p>
			<p>$view_thankyou</p>";
			$to = $email;
			$headers .= "From:  $temp noreply@$temp ";

			$arr_video=array("date"=>time(),"manager_id"=>$user_id,"email"=>$email,"text"=>"<p> $view_send_link_change_password</p>");
			insert_to_data_base($arr_video,'new_member_email_archive',$coms_conect);
			$subject = "$view_link_change_password"; 
			yepmail($to,$subject,$text,$headers);
			$text='~<br><div class="col-md-12"><div class="alert alert-success">';
			$text  .="$view_longtext16 </div> </div>";
			
			//show_msg($view_password_reset_email);
			echo $text;
		 }else{
			      echo $row['question'].'~';
				 echo "<br><div class='col-md-12'><div class='alert alert-danger'>$view_incorrect_reply</div></div> ";
			 // show_msg_warninig($view_incorrect_reply);
			  exit;
		  }
      }else
	   echo "~<br><div class='col-md-12'><div class='alert alert-danger'>$view_email_not_exist</div></div>";
   exit; }	
  
if($action=='article_type_change'){
	?><div  class="row">
		<?if($id==1||$id==0){$article_type=" and bublish=$id";
			$_SESSION['article_type']=$article_type;
		}  if($id==2)
			$_SESSION['article_type']='';
		
		if($value==1){$article_order=" desc ";
		$_SESSION['article_order']=$article_order;}
		else $_SESSION['article_order']='';
		
			$sql1 = "SELECT count(a.id) as cnt from new_article a ,new_file_path b where 
			 b.name='article_image'  and a.status=1 and b.type=7 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' and publish_date<='$now' {$_SESSION['article_type']}";
			// echo $sql1;
			 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/article/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select author,view,publisher,adress,abstract ,title,la,a.id,publish_date from new_article a ,new_file_path b where
			 b.name='article_image'  and status=1 and b.type=7 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
			{$_SESSION['article_type']}
			group by a.id  order by a.id {$_SESSION['article_order']} LIMIT $from,$to) a ";
			 // echo $query;
			 $result = $coms_conect->query($query);$i=$paging;
			 while($row = $result->fetch_assoc()) {?>
              <div class="col-md-12 item row pull-right">
                  <div class="col-md-12 col-xs-12 pull-right">
                       <a href="<?="/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><img src="<?=get_modual_pic_address($row['adress'],$site,$domain,7)?>" alt="<?=$row['title']?>"/></a>
                  </div>
                  <div class="col-md-12 col-xs-12 pull-right">
                       <a href="<?="/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3><?=$row['title']?></h3></a>
                       <p class="excert"><?=$row['abstract00']?></p>
                       <p class="info">
							<?$cat_id=get_result("select cat_id from new_modules_catogory  where  page_id={$row['id']} and type=7",$coms_conect);?>
							<a  href='<?="/article/{$row['la']}/category/$cat_id/1"?>' ><span><i class="fa fa-folder-o"></i><?=get_result("select name from new_modules_cat a ,new_modules_catogory b   where b.page_id={$row['id']} and b.type=7 and a.id=b.cat_id",$coms_conect)?></span></a>
							<span><i class="fa fa-user"></i><?=$row['author']?></span>
							<span><i class="fa fa-print"></i><?=$row['publisher']?></span>
                      </p>
                  </div>
               </div>
			<?}?>
      </div> 
	<?=$pgsel?>	  
<?}

if($action=='download_type_change'){
	?><div  class="row">
		<?if($id==1||$id==0){$download_type=" and bublish=$id";
			$_SESSION['download_type']=$download_type;
		}  if($id==2)
			$_SESSION['download_type']='';
		
		if($value==1){$download_order=" desc ";
		$_SESSION['download_order']=$download_order;}
		else $_SESSION['download_order']='';
		
			$sql1 = "SELECT count(a.id) as cnt from new_download a ,new_file_path b where 
			 b.name='download_pic'  and a.status=1 and b.type=6 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' ";
		  	 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/download/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select view,adress,abstract ,title,la,a.id from new_download a ,new_file_path b where
			 b.name='download_pic'  and status=1 and b.type=6 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' 
			 
			group by a.id  order by a.id {$_SESSION['download_order']} LIMIT $from,$to) a ";
			//  echo $query;
			 $result = $coms_conect->query($query);$i=$paging;
			 while($row = $result->fetch_assoc()) {?>
              <div class="col-md-12 item row pull-right">
                  <div class="col-md-12 col-xs-12 pull-right">
                       <a href="<?="/download/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><img src="<?=get_modual_pic_address($row['adress'],$site,$domain,6)?>" alt="<?=$row['title']?>"/></a>
                  </div>
                  <div class="col-md-12 col-xs-12 pull-right">
					    <a href="<?="/download/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3><?=$row['title']?></h3></a> 
                       <p class="excert"><?=$row['abstract']?></p>
                       <p class="info">
							<?$cat_id=get_result("select cat_id from new_modules_catogory  where  page_id={$row['id']} and type=6",$coms_conect);?>
							<a  href='<?="/download/{$row['la']}/category/$cat_id/1"?>' >
							<span title="<?=$view_category?>"><i class="fa fa-folder-o"></i><?=get_result("select name from new_modules_cat a ,new_modules_catogory b   where b.page_id={$row['id']} and b.type=6 and a.id=b.cat_id",$coms_conect)?></span></a>
					  </p>
                  </div>
               </div>
			<?}?>
      </div> 
	<?=$pgsel?>	  
<?}



if($action=='download_type_change_cat'){
	?><div  class="row">
		<?if($id==1||$id==0){$download_type=" and bublish=$id";
			$_SESSION['download_type']=$download_type;
		}  if($id==2)
			$_SESSION['download_type']='';
		
		if($value==1){$download_order=" desc ";
		$_SESSION['download_order']=$download_order;}
		else $_SESSION['download_order']='';
		
			$sql1 = "SELECT count(a.id) as cnt from new_download a ,new_file_path b where 
			 b.name='download_pic'  and a.status=1 and b.type=6 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' ";
		  	 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/download/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select view,adress,abstract ,title,la,a.id from new_download a ,new_file_path b,new_modules_catogory c where
			 b.name='download_pic'  and status=1 and b.type=6 and c.type=6 and c.cat_id='$value' and a.id=c.page_id and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' 
		 	group by a.id  order by a.id {$_SESSION['download_order']} LIMIT $from,$to) a ";
		 	 $result = $coms_conect->query($query);$i=$paging;
			 while($row = $result->fetch_assoc()) {?>
              <div class="col-md-12 item row pull-right">
                  <div class="col-md-12 col-xs-12 pull-right">
                       <a href="<?="/download/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>">
						<img src="<?=get_modual_pic_address($row['adress'],$site,$domain,6)?>" alt="<?=$row['title']?>"/>
					   </a>
                  </div>
                  <div class="col-md-12 col-xs-12 pull-right">
					    <a href="<?=get_result("select  adress from new_modual_links where modual_id='{$row['id']}' and type=6",$coms_conect)?>"><h3><?=$row['title']?></h3></a>
                       <p class="excert"><?=$row['abstract']?></p>
                       <p class="info">
							<?$cat_id=get_result("select cat_id from new_modules_catogory  where  page_id={$row['id']} and type=6",$coms_conect);?>
							<a  href='<?="/download/{$row['la']}/category/$cat_id/1"?>' >
							<span title="<?=$view_category?>"><i class="fa fa-folder-o"></i><?=get_result("select name from new_modules_cat a ,new_modules_catogory b   where b.page_id={$row['id']} and b.type=6 and a.id=b.cat_id",$coms_conect)?></span></a>
					  </p>
                  </div>
               </div>
			<?}?>
      </div> 
	<?=$pgsel?>	  
<?}




if($action=='gallery_ajax'){?>
			<div id="gallery">
				 <?$sql12 = "SELECT a.album_type,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=9 and site='$id' and a.la='{$_SESSION['la']}' and publish_date<=$now 
							group by b.page_id
							order by a.id desc
							limit 0,9";
						// echo $sql12;//exit;
							$qaz = $coms_conect->query($sql12);$i=1;
							while($row = $qaz->fetch_assoc()) {
								$sql11="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row['id']}";	
								$result1 = $coms_conect->query($sql11);
								$row1 = $result1->fetch_assoc();
					 ?> 
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="/gallery/<?=$row['la']?>/<?=$row['id'].'/'.insert_dash($row['title'])?>"> 
                                <figure> 
                                    <img class = "hvr-glow" title="<?=$row['title']?>" src="<?=get_gallery_thumbnail($row1['adress'],$row['album_type'])?>" alt="<?=$row['title']?>">
                                    <p class="text-length"></p>

									<?if($row['mudoal_lock']==1){?>
									<span class="fa fa-lock col-md-1 col-md-offset-1" style="bottom: -10px;"></span>
									<?}?><h2 style="margin-top: 0px; font-size:19px;"><?=$row['title']?></h2>
                                </figure>
                            </a>
                        </div>
                    </div>
							<?$i++;}?>
					</div>
                    <div class="col-xs-12 moreitemsbtn">
                        <h4>
                            <a href="#"  id="ajax_pagissssn"><span class="fa fa-plus"></span></a>
                        </h4>
						<input hidden id="page_num" value="9">
                   
 </div>
<?
					
}


if($action=='show_gallery_ajax'){
	/*$sql1 = "SELECT count(a.id) as cnt  from new_gallery a,new_file_path b  
	where a.id>0 and b.id='$id' and b.type=9 and status=1 and name='galery_pic' and  a.id=b.id";
	$result = $coms_conect->query($sql1);
	$RS = $result->fetch_assoc();
	
	$title=get_result("select title from new_gallery where id=$id",$coms_conect);
	
	$a=new_pgsel($value,$RS["cnt"],24,24,"$root/gallery/{$_SESSION['la']}/$id/".insert_dash($title).'/page');
	$from=$a[0];
	$to=$a[1];
	$pgsel=$a[2];			
	$sql12 = "SELECT a.la,a.album_type,a.id,b.adress,a.title,a.mudoal_lock from new_gallery a,new_file_path b   
	where a.id>0 and a.id=b.id and b.type=9  and name='galery_pic' and b.id='$id' and status=1
	order by a.id desc
	LIMIT $from,$to";
	
	
	
	// echo $sql12;exit;
	$resultd1 = $coms_conect->query($sql12);
	if(mysqli_num_rows($resultd1)<1){
		include 'new_dynamics/no_modual.php4';	
			}else if ($row1['mudoal_lock']==1&&!isset($_SESSION["new_okusername"])) get_login_form($site_url);else{	
		echo'<ul id="lightgallery" class="list-unstyled">';
			while($row1 = $resultd1->fetch_assoc()) {
				$la=$row1['la'];
				$title=$row1['title'];
				$id= $row1['id'];
			 ?>
			 <li class="col-md-4 col-xs-6 item pull-right glistpic"  data-src="<?=$row1['adress']?>" data-sub-html="<h4><?=$row1['title']?></h4>">
				<a href="" class="hvr-glow" title="<?=$row1['title']?>">
					<img class="img-responsive img-list-item" src="<?=get_gallery_thumbnail($row1['adress'],$row1['album_type'])?>" alt="<?=$row1['title']?>">
				</a>
			</li>
			<?} 

 
	echo '	</ul>'.$pgsel.'~~~';	
		$sql11="select id from new_related_madual where type=9  and page_id='$id'";	
	    $result1 = $coms_conect->query($sql11);
		while($row11 = $result1->fetch_assoc()){
			$related_id[]=$row11['id'];
		}?>
			<script>
			var divs = $("div > .glistpic");
				for(var i = 0; i < divs.length; i+=3) {
				  divs.slice(i, i+3).wrapAll("<div class='row'></div>");
				}
			</script>
			
			<legend><?=$view_related_gallery?>:</legend>
				<div class="owl-carousel" id="owl-news">
					
						
						<?$j=0;
						if(count($related_id)){
							foreach($related_id as $related__id){
							$sql112="select a.album_type,a.id,b.adress,a.title,a.la from new_file_path b,new_gallery a  where b.type=9 and b.name='galery_pic' and b.id ={$related__id} and a.id=b.id and a.id={$related__id} group by a.id";	
							 
							$result12 = $coms_conect->query($sql112);
							$row12 = $result12->fetch_assoc();
							?>	
							<div class="item">
							<a class = "hvr-glow" href="/gallery/<?=$row12['la']?>/<?=$row12['id'].'/'.insert_dash($row12['title'])?>">
							  <img class = "lazyOwl hvr-glow" src="<?=get_gallery_thumbnail($row12['adress'],$row12['album_type'])?>" alt="<?=$row12['title']?>" width="300" height="200">
							  </a>
							  <a href="/gallery/<?=$row12['la']?>/<?=$row12['id'].'/'.insert_dash($row12['title'])?>" class="desc"><?=$row12['title']?></a>
							</div>
							<?$j++;
							}
						}
						 
						$cat_id=get_result("select cat_id from new_modules_catogory where page_id=$id",$coms_conect);
						if($j<6){
							$j=6-$j;
							$sql120 = "SELECT a.la,a.album_type,a.id,b.adress,a.title,a.mudoal_lock from new_gallery a,new_file_path b,new_modules_catogory c   
							where a.id>0 and a.id=b.id and b.type=9 and c.type=9 and a.id<>$id and c.page_id=a.id and c.cat_id=$cat_id and name='galery_pic'   and status=1
							order by a.id desc limit 0,$j";
							// echo $sql120;//exit;
							$resultd10 = $coms_conect->query($sql120);
							while($row10 = $resultd10->fetch_assoc()) {	
							?>
							<div class="item">
								<a class = "hvr-glow" href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>">
									<img class = "lazyOwl hvr-glow" src="<?=get_gallery_thumbnail($row10['adress'],$row10['album_type'])?>" alt="<?=$row12['title']?>" width="300" height="200">
								 </a>
								<a href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>" class="desc"><?=$row10['title']?></a>
							</div>	
						<?}}?>
						</div>	
						<script>
						$(document).ready(function() {
						 
						  $("#owl-news").owlCarousel({
							rtl:true,
							lazyLoad : true,
							nav : true,
							loop : true,
							navText : ["<?=$view_Previous?>","<?=$view_Next?>"],
							responsive:{
								0:{
									items : 1
								},
								600:{
									items : 2
								}, 
								1000:{
									items : 3
								}
							}

						  }); 
						 
						});
						</script>				
				 
		<? 
	}
*/
}


if($action=='news_type_change'){
	 
	 	if($id==2) 
			$time=strtotime("-1 week");
		if($id==1)
			$_SESSION['news_type']='';
			$time=strtotime("-1 month");
	   	   $news_type=" and publish_date>=$time";
		   if($id==0)
			   $news_type='';
			$_SESSION['news_type']=$news_type;
		if($value==1){$news_order=" desc ";
		$_SESSION['news_order']=$news_order;}
		else $_SESSION['news_order']='';
		
			$sql1 = "SELECT count(a.id) as cnt from new_news a ,new_file_path b where 
			 b.name='news_image'  and a.status=1 and b.type=1 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' {$_SESSION['news_type']}";
		 
			 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/news/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b where
			 b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
			{$_SESSION['news_type']}
			group by a.id  order by a.id {$_SESSION['news_order']} LIMIT $from,$to) a  ";
			 //   echo $query;//exit;
			 $result = $coms_conect->query($query);$i=$paging;$j=0;$k=0;
			 while($row = $result->fetch_assoc()) {
				// echo $j.'<br>ss';
				 if($j % 3 ==0){
					echo ' <div  class="row">
					<ul class="pl0 listshow">'; 
				 }$k++; 
				  ?>							
												<!--div class="item col-xs-4 col-lg-4 list-group-item">
													<div class="thumbnail">
														<img class="group grid-group-image" src="<?=$row['adress']?>" alt="<?=$row['title']?>" />
														<div class="caption" style="direction: rtl;">
															<h4 class="group inner grid-group-item-heading" style="color: #BDBDBD;"><?=$row['name']?></h4>
															<h4 class="group inner grid-group-item-text" id="gridtitr<?=$i?>"><a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><?=$row['title']?></a></h4>
															<div class="row" style="margin-top: 45px;">	
																<div class="co-lg-7 col-md-7 label label-default" id="fixdate">
																	<span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la'])?>    <span class="fa fa-eye"></span> <?=$row['view']?>
																	<?if($row['mudoal_lock']==1){?>
																	<span class="fa fa-lock"></span>
																	<?}?>
																</div> 
															</div>	
														</div>
													</div>
												</div-->
												<li class="col-md-4 col-sm-6 griditem animated fadeIn"> 
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" class="hvr-grow" style="width :100%;"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                    <h4><?=$row['name']?></h4>
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>"><h3 id="gridtitr<?=$i?>" class="gridtitrlc"><?=$row['title']?></h3></a>
												    <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la'])?><span class="fa fa-eye"></span> <?=$row['view']?></p>
                                                </li>
                                                <li class="col-md-4 col-sm-6 listitem animated fadeIn">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 pull-right pl0">
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" class="hvr-grow" style="width :100%;"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 pull-right rtl">
                                                            <h4><?=$row['name']?></h4>
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>"><h3 id="listtitr<?=$i?>" class="titrlc"><?=$row['title']?></h3></a>
                                                            <p id="listtext<?=$i?>" class="kholase textlc"><?=$row['abstract']?></p>
                                                        </div>
                                                        <div class="col-xs-12 pull-right rtl">
                                                            <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la']);?><span class="fa fa-eye"></span>  <?=$row['view']?></p>
                                                        </div>
                                                    </div>
                                                </li>
			<? if($k  ==3){
					echo '</ul></div>'
					;$k=0;
				 }
			$i++;$j++;}
			if($k<3){
			echo '</ul></div>'
					;$k=0;
			}
			?>
 <div class="row">
	<?=$pgsel?>	  
 </div>
<?}
  

 
 
if($action=='content_type_change'){
$_SESSION['content_type0']=$id;
	if($id==2) 
	$time=strtotime("-1 week");
if($id==1)
	$_SESSION['content_type']='';
	$time=strtotime("-1 month");
   $content_type=" and publish_date>=$time";
   if($id==0)
	   $content_type='';
	$_SESSION['content_type']=$content_type;
if($value==1){$content_order=" desc ";
$_SESSION['content_order']=$content_order;}
else $_SESSION['content_order']='';
 
?>
        <div class="content">
			<?			$sql1 = "SELECT count(a.id) as cnt from new_content a ,new_file_path b where 
			 b.name='content_image'  and a.status=1 and b.type=11 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' {$_SESSION['content_type']}";
		 
			 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],10,10,"/content/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select user_id,view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_content a ,new_file_path b where
			 b.name='content_image'  and status=1 and b.type=11 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
			{$_SESSION['content_type']}
			group by a.id  order by a.id {$_SESSION['content_order']} LIMIT $from,$to) a  ";
			 //   echo $query;//exit;
			 $result = $coms_conect->query($query);$i=$paging;$j=0;$k=0;
			 while($row11 = $result->fetch_assoc()) {
		  	?>	
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 pull-right rtl sr_no_padd_1">
                        <div class="photo">
                            <figure>
                                <a href="<?="/content/{$row11['la']}/{$row11['id']}/".insert_dash($row11['name'])?>" class="hvr-grow">
								<img src="<?=$row11['adress']?>" alt="<?=$row11['title']?>"></a>
                            </figure>
                        </div>
                    </div> 
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 pull-right rtl">
                        <div class="text">
						<h6>
						
							<?$queryp="select b.cat_id,a.name from new_modules_cat a ,new_modules_catogory b where
								a.id=b.cat_id and b.type=11 and a.type=11 and b.page_id={$row11['id']} order by rang";
								$resultp = $coms_conect->query($queryp);
								$p=array();$i=50;
								while($rowp = $resultp->fetch_assoc()) {?>
								<a href="/content/<?=$row11['la']?>/category/<?=$rowp['cat_id']?>" style=" background: rgb(<?=150+$i?>, <?=27+$i?>, <?=124+$i?>);"  class="news_item_tag">
									<?=$rowp['name']?>
								</a> 
							<?$i=$i+50;}?>
 
						<a href="<?="/content/{$row11['la']}/{$row11['id']}/".insert_dash($row11['name'])?>" class="pull-left">
                                    <span class="comment-number">
                                    <?=get_result("select count(id) from new_madules_comment where madul_id={$row11['id']} and type=11",$coms_conect);?>
                                    </span>
									<i class="fa fa-comment-o" aria-hidden="true"></i>
                                </a>
						</h6>
						<a href="<?="/content/{$row11['la']}/{$row11['id']}/".insert_dash($row11['name'])?>"><h3><?=$row11['title']?></h3></a>
                            <h6 class="news_item_author">
                                <span class="sr-news-name"><a href="<?="/content/{$row11['la']}/{$row11['id']}/".insert_dash($row11['name'])?>">
                                    <?=get_result("select name from new_managers where id={$row11['user_id']}",$coms_conect)?>
                                </a></span>
                                |

                                <span class="sr-news-date">
                                   
									<?=jdate('d  F  Y | H:m:s',$row11['date']);?>
                                </span>
	 
                            </h6>
                            <p class="hidden-sm hidden-xs"><?=$row11['abstract']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
  
			<?}?>
            </div>
 <div class="row">
	<?=$pgsel?>	  
 </div>

<?	 
	 
	 
	 
/*	 

		
			$sql1 = "SELECT count(a.id) as cnt from new_content a ,new_file_path b where 
			 b.name='content_image'  and a.status=1 and b.type=11 and   
			 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' {$_SESSION['content_type']}";
		 
			 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/content/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from (select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_content a ,new_file_path b where
			 b.name='content_image'  and status=1 and b.type=11 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
			{$_SESSION['content_type']}
			group by a.id  order by a.id {$_SESSION['content_order']} LIMIT $from,$to) a  ";
			 //   echo $query;//exit;
			 $result = $coms_conect->query($query);$i=$paging;$j=0;$k=0;
			 while($row = $result->fetch_assoc()) {
				// echo $j.'<br>ss';
				 if($j % 3 ==0){
					echo ' <div  class="row">
					<ul class="pl0 listshow">'; 
				 }$k++; 
				  ?>							
												<!--div class="item col-xs-4 col-lg-4 list-group-item">
													<div class="thumbnail">
														<img class="group grid-group-image" src="<?=$row['adress']?>" alt="<?=$row['title']?>" />
														<div class="caption" style="direction: rtl;">
															<h4 class="group inner grid-group-item-heading" style="color: #BDBDBD;"><?=$row['name']?></h4>
															<h4 class="group inner grid-group-item-text" id="gridtitr<?=$i?>"><a href="<?="/content/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><?=$row['title']?></a></h4>
															<div class="row" style="margin-top: 45px;">	
																<div class="co-lg-7 col-md-7 label label-default" id="fixdate">
																	<span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la'])?>    <span class="fa fa-eye"></span> <?=$row['view']?>
																	<?if($row['mudoal_lock']==1){?>
																	<span class="fa fa-lock"></span>
																	<?}?>
																</div> 
															</div>	
														</div>
													</div>
												</div-->
												<li class="col-md-4 col-sm-6 griditem animated fadeIn"> 
                                                    <a href="<?="/content/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" class="hvr-grow" style="width :100%;"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                    <h4><?=$row['name']?></h4>
                                                    <a href="<?="/content/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>"><h3 id="gridtitr<?=$i?>" class="gridtitrlc"><?=$row['title']?></h3></a>
												    <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la'])?><span class="fa fa-eye"></span> <?=$row['view']?></p>
                                                </li>
                                                <li class="col-md-4 col-sm-6 listitem animated fadeIn">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 pull-right pl0">
                                                            <a href="<?="/content/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" class="hvr-grow" style="width :100%;"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 pull-right rtl">
                                                            <h4><?=$row['name']?></h4>
                                                            <a href="<?="/content/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>"><h3 id="listtitr<?=$i?>" class="titrlc"><?=$row['title']?></h3></a>
                                                            <p id="listtext<?=$i?>" class="kholase textlc"><?=$row['abstract']?></p>
                                                        </div>
                                                        <div class="col-xs-12 pull-right rtl">
                                                            <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']),$row['la']);?><span class="fa fa-eye"></span>  <?=$row['view']?></p>
                                                        </div>
                                                    </div>
                                                </li>
			<? if($k  ==3){
					echo '</ul></div>'
					;$k=0;
				 }
			$i++;$j++;}
			if($k<3){
			echo '</ul></div>'
					;$k=0;
			}
			?>
 <div class="row">
	<?=$pgsel?>	  
 </div>
<?
*/
}
 
 
 
 
 
 
  
  if($action=='send_email'){
      $query="SELECT count(id)as count,user_name from new_managers where email='$id'";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      if($row['count']==1){
        $msg="$view_valid_endoftoday\n\r";
        $val=create_reset_password($row['user_name']);
        $msg='http://'.$_SERVER['HTTP_HOST'].'/new_email_reset_passwrod.php?val='.$val;
        yepmail("$id","$view_change_password2",$msg);
        $arr_attach=array("email"=>$id,"date"=>time(),"text"=>"$msg","manager_id"=>$manager_id);
        insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);
        $query1="update new_managers set email_link='$val' where user_name='{$row['user_name']}'"; 
        $coms_conect->query($query1);
        echo 1;      
      }else 
        echo 0;
  }

      
  if($action=='del_avatar'){  
	$row['avatar']=get_result("select avatar from new_members where user_name='$id'",$coms_conect);
    if(file_exists("new_avatar/{$row['avatar']}")){
      unlink("new_avatar/{$row['avatar']}");
      $condition="user_name='{$_SESSION["new_okusername"]}'";
      $arr_pic=array("avatar"=>'');
      update_data_base($arr_pic,'new_members',$condition,$coms_conect);
    }
  }

  if($action=='show_member_pm'){  
     echo get_result("select text from new_member_pm where id=$id and resiver ='{$_SESSION['new_okusername']}'",$coms_conect);
	 //   echo "update new_member_pm set pm_read=1 where id='$id'";
		$query1="update new_member_pm set pm_read=1 where id='$id'"; 
		$coms_conect->query($query1);
  }
  
  if($action=='del_pm'){  
    $query1="delete from new_member_pm where id='$id'"; 
    $coms_conect->query($query1);
  }  
  
  if($action=='del_favorite'){  
    $query1="delete from new_favorite where id='$id'"; 
    $coms_conect->query($query1);
    echo $query1;
  }
?>  
