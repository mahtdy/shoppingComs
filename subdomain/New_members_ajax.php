<?error_reporting(E_ERROR | E_PARSE);
include_once("coms/function.php");
include_once("coms/include/Database.php");
include_once("coms/jdf.php");
@session_start();
$can_add=$_SESSION["can_add"];
$action=injection_replace($_POST['action']);
$id=injection_replace($_POST['id']);
$value=injection_replace($_POST['value']);
	if($action=='check_users'){
		$sql="select count(id) as count from new_members where user_name='$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		echo $row['count'];
	}
	if($action=='send_again_sms'){
		if($_SESSION["new_usersendsms_count"]>=5)
			echo 0;
		else{
			$query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
			$result=mysql_db_query($dbname,$query,$RSconn);
			$row = mysql_fetch_array($result);
			$url=$row['url'];
			$sms_password=$row['sms_password'];
			$sms_user=$row['sms_user'];
			$senderNumbers=array($row['senderNumbers']);
			$sendDate=array(time());
			$str=rand(100000,10000000);
			$_SESSION["new_smsvalue"]=$str;
			$recipientNumbers=array($_SESSION["new_usermobile"]);
			$messageBodies=array($str);
			$sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate);
			if($sms==1){
				$_SESSION["new_usersendsms_count"]++;
				$query1="update new_members set sms_value='$str' where user_name='$user'"; 
				mysql_db_query($dbname,$query1,$RSconn);
				echo 1;
			}
		}
		
	}
	
	if($action=='send_maanger_sms'){
			$query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
			$result=mysql_db_query($dbname,$query,$RSconn);
			$row = mysql_fetch_array($result);
			$url=$row['url'];
			$sms_password=$row['sms_password'];
			$sms_user=$row['sms_user'];
			$senderNumbers=array($row['senderNumbers']);
			$sendDate=array(time());
			$str=rand(100000,10000000);
			$_SESSION["new_smsvalue"]=$str;
			$recipientNumbers=array($id);
			$messageBodies=array($str);
						
			$query="SELECT mobile,id from new_managers where mobile='$id'";
			//echo $query;
			$result=mysql_db_query($dbname,$query,$RSconn);
			$row = mysql_fetch_array($result);
			$mobile=$row['mobile'];
			$user_id=$row['id'];
			
			if($mobile==$id){
				$sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate);
				if($sms==1){
					$_SESSION["new_usersendsms_count"]++;
					$query1="update new_managers set sms_value='$str' where id='$user_id'"; 
					mysql_db_query($dbname,$query1,$RSconn);
					echo '<br>	<label class="block clearfix">
							<span class="block input-icon input-icon-right">
							<input type="text" name="code_number" id="code_number" class="form-control" placeholder="کد را وارد نمایید" />
								<i class="ace-icon fa fa-envelope"></i>
								</span>
							</label>
							<div class="clearfix">
								<button type="button" id="send_code" class="width-35 pull-right btn btn-sm  ">
									<i class="ace-icon fa fa-lightbulb-o"></i>
									<span class="bigger-110"> ارسال کد</span>
								</button>
							</div>';
				}	
			}
		}
	
	
	if($action=='send_maanger_code'){
			$query="SELECT sms_value,user_name from new_managers where mobile='$id'";
			$result=mysql_db_query($dbname,$query,$RSconn);
			$row = mysql_fetch_array($result);
			if($row['sms_value']==$value){
				$_SESSION['answer_qestion']=$row['user_name'];
				echo 1;			
			}else 
				echo 0;
	}
	if($action=='send_email'){
			$query="SELECT count(id)as count,user_name from new_managers where email='$id'";
			$result=mysql_db_query($dbname,$query,$RSconn);
			$row = mysql_fetch_array($result);
			if($row['count']==1){
				$msg="این اینک تا پایان امروز معتبر  می باشد\n\r";
				$val=create_reset_password($row['user_name']);
				$msg='http://'.$_SERVER['HTTP_HOST'].'/new_email_reset_passwrod.php?val='.$val;
				yepmail("$id","تغییر کلمه عبور",$msg);	
				$query1="update new_managers set email_link='$val' where user_name='{$row['user_name']}'"; 
				mysql_db_query($dbname,$query1,$RSconn);
				echo 1;			
			}else 
				echo 0;
	}

			
	if($action=='del_avatar'){	
		$sql="select avatar from new_members where user_name='$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if(file_exists("new_avatar/{$row['avatar']}")){
			unlink("new_avatar/{$row['avatar']}");
			$condition="user_name='{$_SESSION["new_okusername"]}'";
			$arr_pic=array("avatar"=>'');
			update_data_base($arr_pic,'new_members',$condition,$dbname,$RSconn);
		}
	}
?>	