<?error_reporting(E_ERROR | E_PARSE); 
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
include_once("newcoms/jdf.php");
include_once("languages/fa.php");
//include_once("coms/include/global.php");
$time=time();
$domain_name= $_SERVER['HTTP_HOST'] ;
  @session_start();
  $can_add=$_SESSION["can_add"];
  $can_edit=$_SESSION["can_edit"];
  $manager_id=$_SESSION["manager_id"];
  $can_delete=$_SESSION["can_delete"];
  $manager_user_name=$_SESSION['manager_user_name'];
  $manager_title_lang=$_SESSION['manager_title_lang'];
  $manager_id=$_SESSION['manager_id'];
  $folder = $_SESSION["manager"];
  $user_ids=injection_replace($_GET['user_ids']);
  $actions=injection_replace($_GET['actions']);
  $values=injection_replace($_GET['values']);
  $ids=injection_replace($_GET['ids']);
  $action=injection_replace($_POST['action']);
  $pro_read=injection_replace($_POST['pro_read']);
  $db_pass=injection_replace($_POST['db_pass']);
  $id=injection_replace($_POST['id']);
  $id_brand=injection_replace($_POST['id_brand']);
//  echo 'ib='.$id_brand;
  $value=injection_replace($_POST['value']);
  $value_brand=injection_replace($_POST['value_brand']);
  $db_user=injection_replace($_POST['db_user']);
  $user_id=injection_replace($_POST['user_id']);
  $field_nmae=injection_replace($_POST['field_nmae']);
  $field_nmae_brand=injection_replace($_POST['field_nmae_brand']);
  $secend_value=injection_replace($_POST['secend_value']);
  $table_name=injection_replace($_POST['table_name']);
  $name=injection_replace($_POST['name']);
  $id_ctlg=injection_replace($_POST['id_ctlg']);
  $id_phone=injection_replace($_POST['id_phone']);
  $id_tozie=injection_replace($_POST['id_tozie']);
  $id_adres=injection_replace($_POST['id_adres']);


//================ mahtdy value ====
$id_PSR=injection_replace($_POST['id_PSR']);
$modual_type=injection_replace($_POST['modual_type']);
$checkid_brand=injection_replace($_POST['checkid_brand']);
//================ End mahtdy value =====






$tem=injection_replace($_POST['tem']);

  $custom_ip=$_SERVER['REMOTE_ADDR'];
if($_SERVER["HTTP_HOST"]=='localhost')
 $ffmpeg = "C:\\xampp\\ffmpeg\\bin\\ffmpeg.exe";
else
	$ffmpeg='ffmpeg';


  if(isset($_SESSION['page_languege']))
	include("languages/{$_SESSION['page_languege']}.php"); 
  
      $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $sms_url=$row['url'];
      $sms_password=$row['sms_password'];
      $sms_user=$row['sms_user'];
      $senderNumbers=array($row['senderNumbers']);
  
  
  if($action=='del_manager'&&$_SESSION['can_delete']==1&&$_SESSION["del_item"]==$action){
  $query="select count(id) as count from new_managers where parent_id=$id";
  $result = $coms_conect->query($query);
  $RS1 = $result->fetch_assoc();
     if($RS1["count"]>0)
    echo 1;
    else if($can_delete!=1||$_SESSION["del_item"]!=$action)
    echo 0;
     else if($can_delete==1||$_SESSION["del_item"]==$action){
      $query1="update new_managers set del_viwe=0,status=0 where id=$id"; 
      $coms_conect->query($query1);
      echo $query1;
    }  
  }
  
if($action=='add_newsletters'){  
  $newsletter_value=get_result("select count(id) from new_newsletters where la='$secend_value' and site='$value' and email='$id' and name='$field_nmae'",$coms_conect);
  if($newsletter_value>0){
      echo 'این ایمیل وجود دارد';
exit;
  }

  else{
	$arr=array("email"=>$id,"ip"=>$custom_ip,"date"=>time(),"site"=>$value,"la"=>$secend_value,"name"=>$field_nmae);
	$id=insert_to_data_base($arr,'new_newsletters',$coms_conect);
      echo 'ایمیل شما با موفقیت ثبت شد';
	exit;
  }
}
if($action=='del_manager_pm'&&$_SESSION['can_delete']==1&&$_SESSION["del_item"]==$action){
	$temp=explode(",",$id);
	foreach($temp as $val){
		$query1="delete from new_manager_pm where id='$val'"; 
		$coms_conect->query($query1);
	}
} 
   
  
if($action=='delete_ajax_newspic'&&$_SESSION['can_delete']==1){
	$value=str_replace(' ','%20',$value);
   $query1="delete from new_file_path where id='$id' and adress='$value' and type=1 and name='news_gallery'"; 
    $coms_conect->query($query1);
}

if($action=='delete_ajax_contentpic'&&$_SESSION['can_delete']==1){
	$value=str_replace(' ','%20',$value);
   $query1="delete from new_file_path where id='$id' and adress='$value' and type=11 and name='content_gallery'"; 
    $coms_conect->query($query1);
}

if($action=='del_email_pm'&&$_SESSION['can_delete']==1){
	$temp=explode(",",$id);
	foreach($temp as $val){
		$query1="delete from new_contactus_pm where id='$val'"; 
		$coms_conect->query($query1);
	}
	
}

if($action=='read_email_contactus_status'&&$_SESSION['can_edit']==1){
	$temp=explode(",",$id);
	foreach($temp as $val){
		$query1="update new_contactus_pm set status=$value where id=$val"; 
	 	$coms_conect->query($query1);
	}
}


if($action=='show_contactus_status'&&$_SESSION['can_edit']==1){
	$query1="update new_contactus_pm set status=1 where id=$id"; 
	$coms_conect->query($query1);
	
	$query="select *   from new_contactus_pm where id=$id";
	//echo $query;
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	 ?>
	
				<!-- #section:pages/inbox.message-header -->
				<div class="message-header clearfix">
					<div class="pull-left">
						 

						<div class="space-4"></div>

						<i class="ace-icon fa fa-star orange2"></i>

						&nbsp;
						<img class="middle" alt="John's Avatar" src="/yep_theme/default/rtl/assets/avatars/avatar.png" width="32">
						&nbsp;
						<a href="#" class="sender"><?=$RS1['name']?></a>

						&nbsp;
						<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
						<span class="time grey"><?=miladitojalaliuser(date('Y-m-d',$RS1['date']));?></span>
					</div>

					<div class="pull-right action-buttons">
						<!--a href="#">
							<i class="ace-icon fa fa-reply sr-green icon-only bigger-130"></i>
						</a-->
						<?if($RS1['type']==0){?>
						<a href="#" id="<?=$RS1['id']?>" class="reply_email" data-email="<?=$RS1['email']?>" data-toggle="modal" data-target="#repeat">
							<i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
						</a>
						<?}?>
							<?if($RS1['type']==2){?>
						<a href="#" id="<?=$RS1['id']?>" class="send_drft" data-email="<?=$RS1['email']?>" data-title="<?=$RS1['name']?>" data-text="<?=$RS1['text']?>" data-toggle="modal" data-target="#repeat">
							<i class="ace-icon fa fa-mail-forward green icon-only bigger-130"></i>
						</a>
						<?}?>
						<a href="#" class="singel_del" id="<?=$RS1['id']?>" data-toggle="modal" data-target="#delete">
							<i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
						</a>
					</div>
				</div>

				<!-- /section:pages/inbox.message-header -->
				<div class="hr hr-double"></div>

				<!-- #section:pages/inbox.message-body -->
				<div class="message-body">
					<p>
						<?=$RS1['text']?>
					</p>

				</div>

				<!-- /section:pages/inbox.message-body -->
				<div class="hr hr-double"></div>
 

<?			
	echo '~'.$RS1['id'].'~'.$RS1['email'];
}


if($action=='save'){

    $query11="SELECT id from new_tem_setting where name='$name' and la='$field_nmae' and site='$secend_value' and tem_name='$tem'";
//echo $query11;

    $result11 = $coms_conect->query($query11);
    $row11 = mysqli_num_rows($result11);
    //echo $row11;
    if ($row11> 0) {
        $query="update new_tem_setting set text='$value' where name='$name' and tem_name='$tem' and la='$field_nmae'  and site='$secend_value'";
       //echo $query;
//        if($type==1)
//            echo $query;
        $coms_conect->query($query);
    }else{
        $query="insert into new_tem_setting(site,pic_adress,la,title,link,pic,text,name,tem_name)values('$secend_value','','$field_nmae','','','','$value','$name','$tem')";
        // echo $query;
//        if($type==1)
//            echo $query;
        $coms_conect->query($query);
    }

}


//====================================spikan =============================
//-------------------------------------box2 video-------------------------------------------------------
if($action=='BoxThree_video'){
    $type=$id;
    ?>
    <div class="col-md-12 input-group">
        <select   class="form-control BoxThree_video_neshane" name="BoxThree_video_subcat_cat">
            <?$sql1 = "SELECT name,id from new_modules_cat  a  where type=$type and la='$field_nmae'";
            //echo $sql1;
            $result1 = $coms_conect->query($sql1);
            echo "<option value='0'>$view_select</option>";
            while($row = $result1->fetch_assoc()) {

                $str='';
                if($row['id']==$value)

                    $str='selected';
                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
    </div>

    <?
}
if($action=='BoxThree_video_content'){
    ?>
    <div class="col-md-12 input-group">
        <select   class="js-BoxThree_video" name="BoxThree_video_subcat_cat_content">
            <?
            $table_id= get_result("SELECT type from new_modules_cat  a  where id=$id and la='$field_nmae'", $coms_conect);
            $sql8="select table_name from new_modules where id='$table_id'";
            $result8 = $coms_conect->query($sql8);
            $table_name = $result8->fetch_assoc();
            $x=$table_name['table_name'];

            $sql11 = "SELECT title,a.id,b.cat_id from $x a , new_modules_catogory b where la='$field_nmae' 
            and b.type='$table_id' and  a.id=b.page_id and b.cat_id='$id'";
            ////echo $sql1;
            // echo $value;
            $result11 = $coms_conect->query($sql11);
            echo "<option value='0'>$view_select</option>";
            while($row11 = $result11->fetch_assoc()) {

                $str='';
                if($row11['id']==$value  )
                    $str='selected';
                echo "<option $str value='{$row11['id']}'>{$row11['title']}</option>";
            }
            ?>
        </select>
        <script>

            $(document).ready(function() {

                $('.js-BoxThree_video').select2();
            });
        </script>
    </div>
    <?
}


//====================================end spikan =============================
//====================================toloezendegie =============================

//====================================end toloezendegie =============================

//====================================drbanihosseini_pregnancy =============================

//==================================== End drbanihosseini_pregnancy =========================
///////===================================arezo code for deleteing

//----------------------------------------------End tabs menu-------------------------------------------------------
//----------------------------------------------mahtdy-------------------------------------------------------


if($action=='del_catalog_reated_catalog_representation'&&$can_delete==1){
    $temp_field_nmae=explode(",",$field_nmae_brand);
    $temp=explode(",",$id_brand);
    $dif_arr=array_diff($temp_field_nmae ,$temp );
//    print_r($dif_arr);exit;
    foreach ($temp as $val){
        $query1="delete from new_catalog_brand_related where id='$val' and type=22 and page_id='$value_brand'";
//        echo $query1;exit;
        $coms_conect->query($query1);
    }

    $id_brand=array_to_string($dif_arr);
}

if($action=="show_related_catalog_representation_show"||$action=="del_catalog_reated_catalog_representation"){
//      echo 'chap table';
//	  echo '<div class="uploadbts">
//			<a   data-toggle="modal" data-target="#show_catalog" data-placement="top" rel="tooltip"><button><span class="flaticon-add133"></span><span>'.$view_add_catalog.'</span></button></a>
//			</div>';
    echo '<div class="toolbox">
			<div class="head"><span class="flaticon-copy23"></span><span style="color: rgb(82, 82, 82);">'.$view_related_catalog_list_representation.'</span>
			</div>
			<div class="tools"><a id="dropdelete_representation" data-toggle="modal" data-target="#del_reated_catalog_representation" data-placement="top"><span style="color:red;" class="flaticon-delete84"></span></a>
			</div>
			</div>';
    echo '<table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
							<th>'.$view_row.'</th>
							<th class="center">
								<label class="position-relative">
									<input type="checkbox" class="conchkSelectAll_representation_form" />
									<span class="lbl"></span>
								</label></th>
								<th>'.$view_title_catalog_representation.'</th>
								
								<th>'.$view_actions.'</th>

								
							</tr>
						</thead>
						<tbody>';

    $totla_related_brand=$id_brand;

?><input type="hidden" class="check_checked_representation" id="check_checked_representation" name="check_checked_representation" value="<?=$totla_related_brand?>"><?
    $temp_arr=explode(",",$id_brand);$i=1;$j=0;



    foreach($temp_arr as $value_brand){
//                        echo 'val=',$value.'=val';
        if($temp_arr[$j]>""){



            $sql12 = "SELECT  id,name,la,site  FROM new_catalog_cat_brand   WHERE id='$value_brand'";

            $resultd1 = $coms_conect->query($sql12);
            $row = $resultd1->fetch_assoc();
            $id=$row['id'];
            ?>
            <tr>
                <td><?=$i?></td>
                <td class="center" style="border-right: none;border-left: none;">
                    <label class="position-relative">
                        <input id='<?=$id?>' type="checkbox"   class="conchkNumber_catalog_representation_form"/>
                        <span class="lbl"></span>
                    </label> 
                </td>
                <?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
                <td><a href="/<?="$domain/representation/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" target="_blank"><?=$row['name']?></a></td>




                <td>
                    <?if($_SESSION["can_delete"]==1){?>
                        <a href="#" id="<?=$id?>" class="del_reated_catalog_representation red" data-title="delete" data-toggle="modal" data-target="#del_reated_catalog_representation" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 5px 0 5px;">
                            <i class="ace-icon fa fa-trash-o bigger-120" title="<?=$view_delete?>"></i>
                        </a>
                    <?}?>
                </td>
            </tr>
            <?$i++;}$j++;}?>

    <!-- show hide click checkbox icon delete group -->
    <script type="text/javascript">
        $(function () {
            $('.conchkSelectAll_representation_form').click( function() {
                $('.conchkNumber_catalog_representation_form').prop('checked', $(this).is(':checked'));
            });
            $('.conchkNumber_catalog_representation_form').click( function() {
                if($('.conchkNumber_catalog_representation_form:checked').length == $('.conchkNumber_catalog_representation_form').length) {
                    $('.conchkSelectAll_representation_form').prop('checked', true);
                }
                else {
                    $('.conchkSelectAll_representation_form').prop('checked', false);
                }
            });

            ////////////
            $("#dropdelete_representation").hide();
            $(".conchkNumber_catalog_representation_form").click(function() {
                if($(this).is(":checked")) {
                    $("#dropdelete_representation").show();
                } else {
                    $("#dropdelete_representation").hide();
                }
            });
            $("#dropdelete_representation").hide();
            $(".conchkSelectAll_representation_form").click(function() {
                if($(this).is(":checked")) {
                    $("#dropdelete_representation").show();
                } else {
                    $("#dropdelete_representation").hide();
                }
            });
        });
    </script>
    </tbody>
    </table>
    <input type="hidden" value="<?=$totla_related_brand?>"  id="totla_related_brand" name="totla_related_brand" >
    <?
}





if($action=='show_related_catalog_representation'){
    echo '
          <table  cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
            <thead>
              <tr>
            
                <th class="center"><label class="position-relative"><input type="checkbox" class="conchkSelectAll_catalog_representation" /><span class="lbl"></span></label></th>
                <th>ID</th>
                <th>'.$view_subject.' </th> 

                
              </tr>
              
            </thead>
            
            <tbody>';
//    $checkid_brand=$check_checked_brand;
//    echo 'chkid brnd=='.$checkid_brand;
    $temp_arr=explode(",",$checkid_brand);
    $query2="select id,name from new_catalog_cat_brand WHERE name LIKE '%$id_brand%'" ;
//  echo $query2;
    $result2 = $coms_conect->query($query2);
    while($RS2 = $result2->fetch_assoc()) {
       ?>
        <input type="hidden" value="<?=$checkid_brand?>" name="conchkNumber_catalog_representation_checked" class="conchkNumber_catalog_representation_checked">
        <tr>
        <th class="center"><label class="position-relative">
        <input type="checkbox" value="<?=$RS2['id']?>"  <? $j=0; foreach($temp_arr as $value_brand){
            if($temp_arr[$j]>"") { if($RS2['id']==$value_brand){ echo 'checked '; }}$j++;}?> class="conchkNumber_catalog_representation"/><span class="lbl"></span></label></th>
        <td><?=$RS2["id"]?></td>
        <td><?=$RS2["name"]?></td>

      
      </tr><?
    }
    echo  '</tbody>
      </table>';

}



if ($action=='del_catalog_ctlg'&&$can_edit==1){
    $sql="delete from new_catalog_catalog where id=$id_ctlg";
    //echo $sql;
    $coms_conect->query($sql);
}



if ($action=='del_catalog_phone'&&$can_edit==1){
    $sql="delete from new_catalog_phone where id=$id_phone";
    //echo $sql;
    $coms_conect->query($sql);
}


if ($action=='del_catalog_adres'&&$can_edit==1){
    $sql="delete from new_catalog_adres where id=$id_adres";
    //echo $sql;
    $coms_conect->query($sql);
}



if ($action=='del_catalog_tozie'&&$can_edit==1){
    $sql="delete from new_catalog_tozie where id=$id_tozie";
    //echo $sql;
    $coms_conect->query($sql);
}



if($action=='edit_page_com_type'&&$can_edit==1){
    $sql="select name,id,la,meta_keyword,meta_desciption,seo_title from new_catalog_cat_type where id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if(check_lang_title($row['la'],$_SESSION["manager_title_lang"])==1)
        echo $row['id']."^".$row['name']."^".$row['meta_keyword']."^".$row['meta_desciption']."^".$row['seo_title'];
}


if($action=='edit_page_com_activity'&&$can_edit==1){
    $sql="select name,id,la,meta_keyword,meta_desciption,seo_title from new_catalog_cat_activity where id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if(check_lang_title($row['la'],$_SESSION["manager_title_lang"])==1)
        echo $row['id']."^".$row['name']."^".$row['meta_keyword']."^".$row['meta_desciption']."^".$row['seo_title'];
}



if($action=='edit_page_com_brand'&&$can_edit==1){
    $sql="select name,id,la,meta_keyword,meta_desciption,seo_title,majol,majol_cat,majol_cat_cont,pic_brand,url_link from new_catalog_cat_brand where id=$id";
//    echo $sql;
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if(check_lang_title($row['la'],$_SESSION["manager_title_lang"])==1)
        echo $row['id']."^".$row['name']."^".$row['meta_keyword']."^".$row['meta_desciption']."^".$row['seo_title']."^".$row['majol']."^".$row['majol_cat']."^".$row['majol_cat_cont']."^".$row['pic_brand']."^".$row['url_link'];
}



if($action=='edit_com_type_status'&&$can_edit==1){
    $_SESSION["father_car_arr"]='';
    $cat_la=get_result("select la from new_catalog_cat_type where id = '$id'",$coms_conect);
    $parent_id=get_result("select parent_id from new_catalog_cat_type where id = '$id'",$coms_conect);
    get_cat_child ($id,$coms_conect,$cat_la);
    get_cat_father ($parent_id,$coms_conect,$cat_la);
    $_SESSION["father_car_arr"] .=$id;
    $temp=explode('#',$_SESSION["father_car_arr"]);
    foreach($temp as $val){
        $query1="update new_catalog_cat_type set status=$value where id=$val";
        $coms_conect->query($query1);
    }
    echo $_SESSION["father_car_arr"];
}


if($action=='edit_com_activity_status'&&$can_edit==1){
    $_SESSION["father_car_arr"]='';
    $cat_la=get_result("select la from new_catalog_cat_activity where id = '$id'",$coms_conect);
    $parent_id=get_result("select parent_id from new_catalog_cat_activity where id = '$id'",$coms_conect);
    get_cat_child ($id,$coms_conect,$cat_la);
    get_cat_father ($parent_id,$coms_conect,$cat_la);
    $_SESSION["father_car_arr"] .=$id;
    $temp=explode('#',$_SESSION["father_car_arr"]);
    foreach($temp as $val){
        $query1="update new_catalog_cat_activity set status=$value where id=$val";
        $coms_conect->query($query1);
    }
    echo $_SESSION["father_car_arr"];
}


if($action=='edit_com_brand_status'&&$can_edit==1){
    $_SESSION["father_car_arr"]='';
    $cat_la=get_result("select la from new_catalog_cat_brand where id = '$id'",$coms_conect);
    $parent_id=get_result("select parent_id from new_catalog_cat_brand where id = '$id'",$coms_conect);
    get_cat_child ($id,$coms_conect,$cat_la);
    get_cat_father ($parent_id,$coms_conect,$cat_la);
    $_SESSION["father_car_arr"] .=$id;
    $temp=explode('#',$_SESSION["father_car_arr"]);
    foreach($temp as $val){
        $query1="update new_catalog_cat_brand set status=$value where id=$val";
        $coms_conect->query($query1);
    }
    echo $_SESSION["father_car_arr"];
}

if($action=='can_comment_catalog'){
    $sql="select user_id,la,site from new_catalog where id=$id";
    $result = $coms_conect->query($sql);
//     echo $id;
//     print_r($result);
    $row = $result->fetch_assoc();
    check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
    check_lang_title($row["site"],$_SESSION["manager_title_site"]);
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
        sign_out();
    else{
        $query1="update new_catalog set can_comment=$value where id=$id";
        $coms_conect->query($query1);
//        echo $query1;
    }
}


if($action=='change_catalog_status'){
    $sql="select user_id from new_catalog a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
    $result = $coms_conect->query($sql);

    $row = $result->fetch_assoc();
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
        sign_out();
    else{
        $query1="update new_madules_comment set status=$value where id=$id";
        $coms_conect->query($query1);
        //  echo $query1;
    }
}



if($action=='del_catalog_comments'){
    $temp=explode(",",$id);
    foreach ($temp as $value){
        $sql="select user_id from new_catalog a,new_madules_comment b  where a.id=b.madul_id and  b.id=$value";
        $result = $coms_conect->query($sql);
        $row = $result->fetch_assoc();
        if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
            sign_out();
        else{
            $query1="delete from new_madules_comment where id='$value'";
            $coms_conect->query($query1);
            echo $query1;

        }
    }
}

if($action=='change_lock_catalog'){
    $sql="select user_id,la,site from new_catalog where id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
    check_lang_title($row["site"],$_SESSION["manager_title_site"]);
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
        sign_out();
    else{
        $query1="update new_catalog set mudoal_lock=$value where id=$id";
        $coms_conect->query($query1);
        //echo $query1;
    }
}

if($action=='del_catalog'){
    $temp=explode(",",$id);

    foreach ($temp as $value){
        $query="select user_id,site,la from new_catalog where id='$value'";
        $result = $coms_conect->query($query);

        $RS1 = $result->fetch_assoc();
//print_r($RS11);
//        check_lang_title($RS1["la"],$_SESSION["manager_title_lang"]);
//        echo $RS1['la'].'sss'.$_SESSION['manager_title_lang'];
//        check_lang_title($RS1["site"],$_SESSION["manager_title_site"]);
//        echo $RS1['site'].'sss'.$R.$W;
//        print_r($_SESSION['manager_title_site']);
//echo $can_delete.'eeee'.$_SESSION['del_item'].'ac'.$action;

//        if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
//        if('1'<'0')
//            sign_out();
//            print_r($RS1);
//            echo 'salam';

//        else{
            $query="select cat_id from new_modules_catogory where page_id='$value' and type=22";
            $result = $coms_conect->query($query);
            while($RS1 = $result->fetch_assoc()) {
                $array_value[]=$RS1['cat_id'];
//            }
            if($array_value>""){
                $tempp=(array_diff($array_value,$_SESSION["manager_page_cat"]));
//                if($tempp[0]!='')
//                    header('Location: new_manager_signout.php');
            }


            #########حذف ÏÓÊå ÈäÏí
            $condition1="page_id=$value and type=22";
            delete_from_data_base('new_modules_catogory',$condition1,$coms_conect);
            #########حذف ÊÕæíÑ
            $condition1="id=$value  and type=22";
            delete_from_data_base('new_file_path',$condition1,$coms_conect);
            ####حذف lable
            $query1="update new_keyword set key_count=key_count-1  where  id in
		(select c.label_id  from new_catalog a ,new_mudoal_label c where   a.id=c.id and c.type=22 and c.id=$value) ";
            $coms_conect->query($query1);
            $condition1="id=$value  and type=22";
            delete_from_data_base('new_mudoal_label',$condition1,$coms_conect);
            $condition="id=$value";
            delete_from_data_base('new_catalog',$condition,$coms_conect);
        }
    }
}

if($action=='del_com_type'){
    //echo $_SESSION["manager_page_cat"].'<br>'.$id;exit;
    if(!in_array($id,$_SESSION["manager_page_cat"]))
        header('Location: new_manager_signout.php');
    $query="select user_id,la from new_catalog_cat_type where id='$id'";
    $result = $coms_conect->query($query);
    $RS1 = $result->fetch_assoc();
    check_lang_title($RS1["la"],$_SESSION["manager_title_lang"]);

    if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1)
        sign_out();

    else if(menu_has_child($id,$coms_conect)==0){

        #########??? ÏÓÊå ÈäÏí
        $condition1="id=$id";
        delete_from_data_base('new_catalog_cat_type',$condition1,$coms_conect);
    }
}


if($action=='del_com_activity'){
    //echo $_SESSION["manager_page_cat"].'<br>'.$id;exit;
    if(!in_array($id,$_SESSION["manager_page_cat"]))
        header('Location: new_manager_signout.php');
    $query="select user_id,la from new_catalog_cat_activity where id='$id'";
    $result = $coms_conect->query($query);
    $RS1 = $result->fetch_assoc();
    check_lang_title($RS1["la"],$_SESSION["manager_title_lang"]);

    if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1)
        sign_out();

    else if(menu_has_child($id,$coms_conect)==0){

        #########??? ÏÓÊå ÈäÏí
        $condition1="id=$id";
        delete_from_data_base('new_catalog_cat_activity',$condition1,$coms_conect);
    }
}



if($action=='del_com_brand'){
    //echo $_SESSION["manager_page_cat"].'<br>'.$id;exit;
    if(!in_array($id,$_SESSION["manager_page_cat"]))
        header('Location: new_manager_signout.php');
    $query="select user_id,la from new_catalog_cat_brand where id='$id'";
    $result = $coms_conect->query($query);
    $RS1 = $result->fetch_assoc();
    check_lang_title($RS1["la"],$_SESSION["manager_title_lang"]);

    if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1)
        sign_out();

    else if(menu_has_child($id,$coms_conect)==0){

        #########??? ÏÓÊå ÈäÏí
        $condition1="id=$id";
        delete_from_data_base('new_catalog_cat_brand',$condition1,$coms_conect);
    }
}

//================ Start  agahi =====
$valuecomment = injection_replace($_POST['valuecomment']);
$idcomment = injection_replace($_POST['idcomment']);
$idpeygiri = injection_replace($_POST['idpeygiri']);
$valuepeygiri = injection_replace($_POST['valuepeygiri']);
$idagahi = injection_replace($_POST['idagahi']);
$idagahi_sabt = injection_replace($_POST['idagahi_sabt']);


//echo $action.$valuecomment.$idcomment;
if($action=='can_comment_agahi'){
//    echo 'salam'.$idcomment;
    $sql="select user_id,la,site from new_agahi where id=$idcomment";
//    echo  $sql;exit;
    $result = $coms_conect->query($sql);
//     echo $id;
//     print_r($result);
    $row = $result->fetch_assoc();

    check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
    check_lang_title($row["site"],$_SESSION["manager_title_site"]);
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
        sign_out();
    else{
        $query1="update new_agahi set can_comment=$valuecomment where id=$idcomment";
        $coms_conect->query($query1);
//        echo $query1;
    }
}
$arr_sabt =explode(',',$_POST['arr_sabt']);

if ($action=='sabt_agahi'){
    $time_sabt=time();
//    echo 'saslalslasasa';
//    print_r($arr_sabt);
    $sql_sabt="INSERT INTO new_agahi_sabt(name, family, mobile, id_agahi,data_publish_sabt)
VALUES ('$arr_sabt[1]','$arr_sabt[2]','$arr_sabt[3]','$arr_sabt[0]','$time_sabt')";
//    echo $sql_sabt;
    $result_sabt = $coms_conect->query($sql_sabt);
}
if($action=='can_peygiri_agahi'){
//    echo 'salam'.$idcomment;
    $sql="select user_id,la,site,a.id,b.id,id_agahi from new_agahi_sabt a, new_agahi b where b.id=id_agahi AND a.id=$idpeygiri";
//    echo  $sql;exit;
    $result = $coms_conect->query($sql);
//     echo $id;
//     print_r($result);
    $row = $result->fetch_assoc();

    check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
    check_lang_title($row["site"],$_SESSION["manager_title_site"]);
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
        sign_out();
    else{
        $query1="update new_agahi_sabt set peygiri=$valuepeygiri where id=$idpeygiri";
        $coms_conect->query($query1);
//        echo $query1;
    }
}
if($action=='del_agahi'){
    $sql="delete from new_agahi where id=$idagahi";
    //echo $sql;
    $coms_conect->query($sql);
}
if($action=='del_agahi_sabt'){
    $sql="delete from new_agahi_sabt where id=$idagahi_sabt";
    //echo $sql;
    $coms_conect->query($sql);
}

//================ End   agahi =====

//================ Start   Like Dislike =====

$likelike= injection_replace($_POST['likelike']);
$type_m= injection_replace($_POST['type_m']);
$m_id= injection_replace($_POST['m_id']);
$ip= injection_replace($_POST['ip_ip']);
$tarikh= injection_replace($_POST['date_date']);
if($action=='oklikelike') {
    $sql="select ip_user from new_like_dislike where  id_content='$m_id' AND type_madoul='$type_m'";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if ($ip!=$row['ip_user']){
    $sqllike = "INSERT INTO new_like_dislike (type_madoul,id_content,ip_user,like_like,date)
                   VALUES ('$type_m','$m_id','$ip','$likelike','$tarikh') ";
    $coms_conect->query($sqllike);
    $sql_like = "SELECT count(like_like)as c_like , (SELECT COUNT(id) FROM new_like_dislike where id_content='$m_id' AND type_madoul='$type_m') as c_id FROM new_like_dislike WHERE like_like=1 AND id_content='$m_id'";
      $result_like = $coms_conect->query($sql_like);
    $row_like = $result_like->fetch_assoc();
    $kol=$row_like['c_id'];
    $c_like=$row_like['c_like'];
    $darsad1=round(($c_like/($kol))*100);
    echo $darsad1.'  درصد این پست را پسندیدند';
}else{echo 'شما قبلا نظر داده اید..';

    }
}
//================ End   Like Dislike =====


//----------------------------------------------End mahdi-------------------------------------------------------

//====================================drbanihosseini =============================

//==================================== End drbanihosseini =========================


//====================================drRezaei =============================
//----------------------------------------------آیکن کنار دکمه جستجو-------------------------------------------

//==================================== End drRezaei =========================

//====================================jamali =============================

//==================================== End jamali =========================



//====================================hashtag # =============================
$hash= injection_replace($_POST['hash']);

if ($action=='search_hashtag'){
    echo 'yohooooo';

}
//==================================== End hashtag #  =========================


//====================================ebnesinahospital=============================

//====================================end ebnesinahospital=============================
//====================================Azarakhsh LED=============================

//==================================== End Azarakhsh LED=========================
//==================================== drsheikhi m-aliakbar=============================

//==================================== End drsheikhi=============================
//==================================== jahansamak  medirence=============================

//==================================== End jahansamak medirence =============================

//====================================hasandefault =============================

//==================================== End hasandefault =========================


if($action=='show_manager_pm'){
	$query="select text,sender from new_manager_pm where id=$id and resiver='{$_SESSION['manager_user_name']}'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	
	$condition="id=$id";
	$arr_slide=array("status"=>1);
    update_data_base($arr_slide,'new_manager_pm',$condition,$coms_conect);
	$_SESSION['sender_manager_pm']=$row['sender'];
	echo $row['text'];
}
if($action=='show_manager_pm_sent'){
	$query="select text from new_manager_pm where id=$id and sender='{$_SESSION['manager_user_name']}'";
	 $result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	echo $row['text'];
}


if($action=='change_domain'){
	$query="SELECT * from new_file_path";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
	  	 $temp=explode('http://',$row['adress']);
		 $domain=explode('/',$temp[1]);
	 	   if($id==$domain[0]){
			unset($domain[0]);
			$news_adress=implode('/',$domain);
	 		$condition="id={$row['auto_number']}";
		    $arr_slide=array("adress"=>'http://'.$value.'/'.$news_adress);
		  update_data_base($arr_slide,'new_file_path',$condition,$coms_conect);
		} 
	}
echo  ' <ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_change_address.'</li>
				</ul>'	;
 
}



if($action=='add_comments_answer'){  
	if($_SESSION['add_commnet']==2){
				echo  ' <ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_comment_recorded.'</li>
				</ul>';
	}else{
			if($_SESSION["code"]==$_POST["rep_com1_captcha"]){
			$rep_comment_id=time(); 
			$rep_madul_id=injection_replace($_POST["rep_comment_id"]);
			$popup_comment_type=injection_replace($_POST["popup_comment_type"]);
			
			$madual_id=injection_replace($_POST["madual_id"]);  
			if($popup_comment_type==5)
			$madual_id=get_result("select id from new_static_page where name='$madual_id'",$coms_conect);
			$rep_name=injection_replace($_POST["rep_name"]);
			$rep_email=injection_replace($_POST["rep_email"]); 
			$rep_text=injection_replace($_POST["rep_comment"]);
			$arr=array("name"=>$rep_name,"email"=>$rep_email,"text"=>$rep_text,"ip"=>$custom_ip,"date"=>$rep_comment_id,"madul_id"=>$madual_id, "rep_id"=>$rep_madul_id,"comment_id"=>0,"type"=>$popup_comment_type);
			$id=insert_to_data_base($arr,'new_madules_comment',$coms_conect); 
			echo ' <ul style="list-style: none;" class="alert alert-success rtl">
					<li>'.$view_comment_record.'</li>
				</ul>';
				$_SESSION['add_commnet']=2;
			}else if(isset($_POST["rep_com1_captcha"])&&$_POST["rep_com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["rep_com1_captcha"]){
			echo  ' <ul style="list-style: none;" class="alert alert-warning rtl">
					<li>'.$view_incorrect_yourcaptcha.'</li>
				</ul>';
		}
	}

}
 
  if($action=='del_member'&&$_SESSION['can_delete']==1&&$_SESSION["del_item"]==$action){
		$temp=explode(",",$id);
			foreach ($temp as $value){
				$query1="delete from new_members where id='$value'"; 
				$coms_conect->query($query1);
			}	
  }
  
  if($action=='del_subsite'&&$_SESSION['can_delete']==1&&$_SESSION["del_item"]==$action){
  $domain=injection_replace($_POST['domain']);
  $user=injection_replace($_POST['user']);
  $pass=injection_replace($_POST['pass']);
  $ip=injection_replace($_POST['ip']);
  $sql="select name from new_subsite where id=$id";
  
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();

      $title=$row['name'];
    
    if(check_lang_title($id,$_SESSION["manager_site"])!=1||$_SESSION["del_item"]!=$action||$_SESSION["manager_user_name"]!='comsroot')
    echo 0;
    else{
    
      include 'httpsocket.php';
      $sock = new HTTPSocket;
      $sock->connect("$ip",2222);
      $sock->set_login("$user","$pass");
      
      $sock->set_method('POST');
      $sock->query('/CMD_API_SUBDOMAINS',
      array(
          'action' => 'delete',
          'domain' => "$domain",
          'select0' => "$title",
          'contents' => 'n'

    ));
  
    $qaz = $sock->get_status_code();
    $q = $sock->fetch_result();
    $result = $sock->fetch_parsed_body();//echo $title ;exit;
      if($qaz==200&&$q='HTTP/1.1 200 OK'){
        $sql="select name from new_subsite   where id=$id";
        $result = $coms_conect->query($sql);
        $row = $result->fetch_assoc();
        
        $site=$row["name"];
      $query1="delete from new_subsite where id='$id'"; 
      $coms_conect->query($query1);
      
      $query1="delete from new_tem_setting where la='fa' and site='$site'"; 
      $coms_conect->query($query1);
      echo $query1;
      
      $query1="delete from new_menu where la='fa' and site_id='$site'"; 
      $coms_conect->query($query1);
      echo $query1;
      }
    }  
  }
if($action=='add_new_label') {
	
	
    if(get_result("SELECT count(id) FROM `new_keyword` WHERE name='$id'",$coms_conect)>0){
		
		return 0;
   	   echo show_msg_warninig('کلمه کلیدی تکراری می باشد');
	}
   else{ 
		$arr_attach=array("name"=>$id,"la"=>$value);
		$test=insert_to_data_base($arr_attach,'new_keyword',$coms_conect);
		echo  $test;
	} 
 }
 
 
 
 if($action=='add_new_label_tags') {
 
    if(get_result("SELECT count(id) FROM `new_keyword` WHERE name='$id'",$coms_conect)>0)
   	   echo show_msg_warninig('کلمه کلیدی تکراری می باشد');
   else{
	$arr_attach=array("name"=>$id,"la"=>$value);
	insert_to_data_base($arr_attach,'new_keyword',$coms_conect);
	$query="select id,name from new_keyword where la='$value'";
		$result = $coms_conect->query($query);
		$i=0;
		while($RS1=$result->fetch_assoc()){ 
			  $temp[$i]['id']=$RS1['id'];
			  $temp[$i]['text']=$RS1['name'];
			  $i++;
		 }
		 print_r(json_encode($temp));	
	
	
	
	
/*	
	?>
	<script type="text/javascript">
 $(document).ready(function() {
    $('#meta_label').select2({
        data: [
				<?
				$query="select id,key_count,name from new_keyword where la='$value'";
				$result = $coms_conect->query($query);
				$i=0;
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
				$name=$RS1["name"].'('.$RS1["key_count"].')';
							if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
				}
		?>
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>ãæÑÏí íÇÝÊ äÔÏ </div>"
          }
    });
});
</script>
 				<div id="show_seo_div">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label"><?=$view_tag?></label>
								<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
							<div class="form-group col-md-6">
								<input  type="text" value='<?=$label?>' name="meta_label" id="meta_label" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
							</div>
						</div>
					</div>
				</div>	   
   

	 
 <?   	   echo show_msg('کلمه کلیدی با موفقیت اضافه گردید');*/
 } 
 }


if($action=='second_choice_box2_drbanihosseini'){
    $type=$id;
//    echo "typ=".$type."%%id=".$id."valu=".$value;
    ?>
    <div class="col-md-12 input-group">
        <select   class="form-control second_choice_box2_drbanihosseini_neshane" id="second_choice_box2_drbanihosseini_subcat_cat" name="second_choice_box2_drbanihosseini_subcat_cat">
            <?$sql1 = "SELECT name,id from new_modules_cat  a  where type=$type";
            //echo $sql1;
            $result1 = $coms_conect->query($sql1);
            echo "<option value='0'>$view_select</option>";
            while($row = $result1->fetch_assoc()) {

                $str='';
                if($row['id']==$value)

                    $str='selected';
                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
    </div>

    <?
}
if($action=='second_choice_box2_drbanihosseini_content'){
//    echo "valu=".$value."secval=".$id;
    ?>
    <div class="col-md-12 input-group">
        <select   class="js-second_choice_box2_drbanihosseini" id="second_choice_box2_drbanihosseini_subcat_cat_content" name="second_choice_box2_drbanihosseini_subcat_cat_content">
            <?
            $table_id= get_result("SELECT type from new_modules_cat  a  where id=$id ", $coms_conect);
            $sql8="select table_name from new_modules where id='$table_id'";
//            echo $sql8.'idtab='.$table_id;
            $result8 = $coms_conect->query($sql8);
            $table_name = $result8->fetch_assoc();
            $x=$table_name['table_name'];

            $sql11 = "SELECT title,a.id,b.cat_id from $x a , new_modules_catogory b where b.type='$table_id' and  a.id=b.page_id and b.cat_id='$id'";
//            echo $sql11;
            // echo $value;
            $result11 = $coms_conect->query($sql11);
            echo "<option value='0'>$view_select</option>";
            while($row11 = $result11->fetch_assoc()) {

                $str='';
                if($row11['id']==$value  )
                    $str='selected';
                echo "<option $str value='{$row11['id']}'>{$row11['title']}</option>";
            }
            ?>
        </select>
        <script>

            $(document).ready(function() {

                $('.js-second_choice_box2_drbanihosseini').select2();
            });
        </script>
    </div>
    <?
}

if($action=='show_videos_catalog'){


    if($secend_value>0){
        $pic_id=get_result("select id from new_file_path where type=22 and name='video_videos' and adress='$id'",$coms_conect);

        $pic=get_result("select adress from new_file_path where type=22 and name='video_pic' and id='$pic_id'",$coms_conect);
        $duration=get_result("select duration from new_video where id =$secend_value",$coms_conect);
    }else {
        $duration=substr(get_durition($ffmpeg,$id),11,9);
        $pic=take_pic_video($ffmpeg,$id);
    }
    //echo $ffmpeg

    echo '<div class="col-md-12 vitems">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item">
											<div   class="ic">
												<div class="vl">
													<a id="show_video_modual" data-title="delete" data-toggle="modal" data-target="#show_add_video" data-placement="top"><span class="play-button"></span></a>
													<img src="'.$pic.'">
												</div>
												<div class="tools">
													<div class="vi">
														  <span class="time">';
    echo $duration;
    echo '</span>
													</div>
													<div class="ticons">
														<!--a href="#"  data-placement="bottom" title="حذف"><span class="delet flaticon-recycling10"></span></a-->
													</div>';
    echo "<input type='hidden' value='$duration' name='duration'>";
    echo '</div>
											</div>
										</div>
									</div>
								</div>';
}

if($action=='show_catalog_videos'){
    if($secend_value>0){
        $pic_id=get_result("select id from new_file_path where type=22 and name='catalog_video' and adress='$id'",$coms_conect);
        $pic=get_result("select adress from new_file_path where type=22 and name='catalog_video_pic' and id='$pic_id'",$coms_conect);
        $duration=get_result("select duration from new_catalog where id =$secend_value",$coms_conect);
    }else {
        $duration=substr(get_durition($ffmpeg,$id),11,9);
        $pic=take_pic_video($ffmpeg,$id);
    }
    //echo $ffmpeg

    echo '<div class="col-md-12 vitems"> 
									<div class="row">
										<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
											<div   class="ic">
												<div class="vl">
													<a id="show_video_modual" data-title="delete" data-toggle="modal" data-target="#show_video_grid" data-placement="top"><span class="play-button"></span></a>
													<img src="'.$pic.'">
												</div>
												<div class="tools"> 
													<div class="vi">
														  <span class="time">';
    echo $duration;
    echo '</span>
													</div>
													<div class="ticons">  
														<!--a href="#"  data-placement="bottom" title='.$view_delete.'><span class="delet flaticon-recycling10"></span></a-->
													</div>';
    echo "<input type='hidden' value='$duration' name='duration'>";
    echo "<input type='hidden' value='$pic' name='catalog_video_pic'>";
    echo '</div>
											</div>
										</div>
									</div>
								</div>';
}


if($action=='del_catalog_videos'){
    if($value>""){
        $query1="UPDATE   new_file_path SET   adress='' where id='$value' and type=22 and name='catalog_video'";
        $coms_conect->query($query1);
    }
}


if($action=='del_catalog_sound'){
    if($value>""){
        $query1="UPDATE   new_file_path SET   adress='' where id='$value' and type=22 and name='catalog_sound'";
        $coms_conect->query($query1);
    }
}

 
  if($action=='del_blocks'){
    if($_SESSION["manager_user_name"]!='comsroot')
      $temp=check_owner_feild('new_blocks',$manager_id,$coms_conect);
    else
      $temp=1;
    if($temp==0||$can_delete!=1||$_SESSION["del_item"]!=$action||$_SESSION["manager_user_name"]!='comsroot')
    echo 0;
    else{
      /*$sql="select type,title from new_blocks where id=$id";
      $result = mysql_query($sql);
      $row = mysql_fetch_array($result);
      $title=$row['title'];
      $type=$row['type'];*/
      $query1="delete from new_blocks where id='$id'"; 
      $coms_conect->query($query1);
      echo $query1;
  
    }  
  }

  if($action=='del_blocks_from_sort'){
  $sql="select  user_id from new_blocks_sorts   where  id=$id";
     
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_action_block"]!=$action)
    echo 0;
    else{

      $query1="delete from new_blocks_sorts where id='$id'"; 
      $coms_conect->query($query1);
       
  
    }  
  }    
  if($action=='del_sort_blocks'){
  $sql="select user_id from new_block_location where id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
  //  if(check_lang_title($row["user_id"],$_SESSION["manager_user_permisson"])!=1||$can_delete!=1||$_SESSION["del_action"]!=$action)
  //  echo 0;
  //  else{

      $query1="delete from new_block_location where id='$id'"; 
      $coms_conect->query($query1);
    //  echo $query1;
  
  //  }  
  }

  
if($action=='change_faq_cat'&&$_SESSION["edit_item"]=='change_faq_cat_show'){
	if($id!=0)
	$str=" and cat_id=$id";	
	$sql12 = "SELECT a.answer,a.question,a.id,a.status   from new_faq  a,new_faq_cat b  
	where a.id>0 and a.status=1 and a.cat_id=b.id  $str and a.site='{$_SESSION['site']}' and a.la='{$_SESSION['la']}' $faq_str 
	order by a.id desc";
	$resultd1 = $coms_conect->query($sql12);$i=1;
	while($row = $resultd1->fetch_assoc()) {
	$id=$row['id'];	?> 
				<li><a id='<?$row['id']?>' href="#"><?=$row['answer']?></a></li>
	<?}
exit;}  

 
  
  if($action=='del_page'){
  $temp=explode(",",$id);
    foreach ($temp as $value){
      $sql="select user_id,la,site from new_static_page where id=$value";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
      check_lang_title($row["site"],$_SESSION["manager_title_site"]);
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
      sign_out();
      else{
 
		
         $query="select cat_id from new_modules_catogory where page_id='$value' and type=5";
		// print_r($_SESSION["manager_page_cat"]);exit;
          $result = $coms_conect->query($query);
              while($RS1 = $result->fetch_assoc()) {
            $array_value[]=$RS1['cat_id'];
          }  
          if($array_value>""){
            $tempp=(array_diff($array_value,$_SESSION["manager_page_cat"]));
           if($tempp[0]!='')
            header('Location: new_manager_signout.php');
          }
		
        #########حذف ÏÓÊå ÈäÏí
          $condition1="page_id=$value and type=5";
          delete_from_data_base('new_modules_catogory',$condition1,$coms_conect);
          #########حذف ÊÕæíÑ
          $condition1="id=$value and type=5";
          delete_from_data_base('new_file_path',$condition1,$coms_conect);
		   ####حذف lable
		 $query1="update new_keyword set key_count=key_count-1  where  id in
			(select c.label_id  from new_static_page a ,new_mudoal_label c where   a.id=c.id and c.type=5 and c.id=$value) "; 
			$coms_conect->query($query1);
		   $condition1="id=$value  and type=5";
          delete_from_data_base('new_mudoal_label',$condition1,$coms_conect);
		  $condition="id=$value";
          delete_from_data_base('new_static_page',$condition,$coms_conect); 
    
      }
    }  
  }

  if($action=='change_page_status'){
    $sql="select user_id from new_static_page a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
      sign_out();
      else{
        $query1="update new_madules_comment set status=$value where id=$id"; 
        $coms_conect->query($query1);
        echo $query1;
      }
    }
    
    if($action=='accept_comment_page_dash'){
    $sql="select user_id from new_static_page a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
      sign_out();
      else{
        $query1="update new_madules_comment set status=1 where id=$id"; 
        $coms_conect->query($query1);
      }
    }  
  
  if($action=='unaccept_comment_page_dash'){
    $sql="select user_id from new_static_page a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
     
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
      sign_out();
      else{
        $query1="update new_madules_comment set status=0 where id=$id"; 
        $coms_conect->query($query1);
      }
    }    
    
  if($action=='del_page_comments'){
  $temp=explode(",",$id);
    foreach ($temp as $value){
      $sql="select user_id from new_static_page a,new_madules_comment b  where a.id=b.madul_id and  b.id=$value";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      //echo $sql;exit;    
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
      sign_out();
      else{
        $query1="delete from new_madules_comment where id='$value'"; 
        $coms_conect->query($query1);
        echo $query1;
    
      }
    }  
  }

  if($action=='del_page_comments_dass'){
      $sql="select user_id from new_static_page a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();  
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1)
      sign_out();
      else{
        $query1="delete from new_madules_comment where id='$id'"; 
        $coms_conect->query($query1);
        echo $query1;
    
      }
  }  

  if($action=='show_mudoal_comment'){
    $sql="select text from new_madules_comment   where  id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
     echo $row["text"];
  }
	  
    if($action=='change_news_status'){
    $sql="select user_id from new_news a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
    $result = $coms_conect->query($sql);

    $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
      sign_out();
      else{
        $query1="update new_madules_comment set status=$value where id=$id"; 
        $coms_conect->query($query1);
      //  echo $query1;
      }
    }
	
	  
    if($action=='change_content_status'){
    $sql="select user_id from new_content a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
    $result = $coms_conect->query($sql);

    $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
      sign_out();
      else{
        $query1="update new_madules_comment set status=$value where id=$id"; 
        $coms_conect->query($query1);
      //  echo $query1;
      }
    }	
	
	
	 if($action=='change_contact_us_status'){
		$sql="select user_id from new_contactus_pm  where  id=$id";
	    $result = $coms_conect->query($sql);
		 $row = $result->fetch_assoc();
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_contactus_pm set status=$value where id=$id"; 
			$coms_conect->query($query1);
			 echo $query1;
      }
    }
	
	
if($action=='change_product_status'){
    $sql="select user_id from new_news a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
    $result = $coms_conect->query($sql);
	 
    $row = $result->fetch_assoc();
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
      sign_out();
      else{
        $query1="update new_madules_comment set status=$value where id=$id"; 
        $coms_conect->query($query1);
        echo $query1;
      }
}	
	
	
    if($action=='change_article_status'){
		$sql="select user_id from new_article a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_madules_comment set status=$value where id=$id"; 
			$coms_conect->query($query1);
		 }
    }	
	
    if($action=='change_download_comment_status'){
		$sql="select user_id from new_download a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_madules_comment set status=$value where id=$id"; 
			$coms_conect->query($query1);
		 }
    }
    if($action=='change_video_comment_status'){
		$sql="select user_id from new_video a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		echo $sql;
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_madules_comment set status=$value where id=$id"; 
			$coms_conect->query($query1);
		 }
    }
    if($action=='change_blog_comment_status'){
		$sql="select user_id from new_blog a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_madules_comment set status=$value where id=$id"; 
			$coms_conect->query($query1);
		 }
    }	
	
	
    if($action=='change_gallery_comment_status'){
		$sql="select user_id from new_gallery a,new_madules_comment b  where a.id=b.madul_id and  b.id=$id";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		
		  if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1||$_SESSION["edit_item"]!=$action)
		  sign_out();
		  else{
			$query1="update new_madules_comment set status=$value where id=$id"; 
			$coms_conect->query($query1);
		 }
    }
	
if($action=='del_news_comments'){
  $temp=explode(",",$id);
    foreach ($temp as $value){
      $sql="select user_id from new_news a,new_madules_comment b  where a.id=b.madul_id and  b.id=$value";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();    
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
      sign_out();
      else{
        $query1="delete from new_madules_comment where id='$value'"; 
        $coms_conect->query($query1);
        echo $query1;
    
      }
    }  
}

if($action=='del_product_comments'){
  $temp=explode(",",$id);
    foreach ($temp as $value){
      $sql="select user_id from new_product a,new_madules_comment b  where a.id=b.madul_id and  b.id=$value";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();    
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_delete!=1||$_SESSION["del_item"]!=$action)
      sign_out();
      else{
        $query1="delete from new_madules_comment where id='$value'"; 
        $coms_conect->query($query1);
        echo $query1;
    
      }
    }  
}      

  if($action=="show_related_product_show"||$action=="del_product_reated_news"){
	  echo '<div class="uploadbts">
			<a   data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add133"></span><span>'.$view_add_product.'</span></button></a>
			</div>';
	  echo '<div class="toolbox">
			<div class="head"><span class="flaticon-copy23"></span><span style="color: rgb(82, 82, 82);">'.$view_related_product_list.'</span>
			</div>
			<div class="tools"><a id="dropdelete" data-toggle="modal" data-target="#del_reated_news" data-placement="top"><span style="color:red;" class="flaticon-delete84"></span></a>
			</div>
			</div>';
		echo '<table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
							<th>'.$view_row.'</th>
							<th class="center">
								<label class="position-relative">
									<input type="checkbox" class="conchkSelectAll_form" />
									<span class="lbl"></span>
								</label></th>
								<th>'.$view_title_product.'</th>
								<th>'.$view_site_name.'</th>
								<th>'.$view_language.'</th> 
								<th>'.$view_actions.'</th>
							</tr>
						</thead>
						<tbody>';
				$totla_related=$id;		
 			 
				$temp_arr=explode(",",$id);$i=1;$j=0;
				 
				
					 
					foreach($temp_arr as $value){
						 if($temp_arr[$j]>""){
						$sql12 = "SELECT  id,site,la,name  from new_product a  where id='$value'";
						$resultd1 = $coms_conect->query($sql12);
						$row = $resultd1->fetch_assoc();
						$id=$row['id'];
						?>
								<tr>
									<td><?=$i?></td>
									<td class="center" style="border-right: none;border-left: none;">
										<label class="position-relative">
											<input id='<?=$id?>' type="checkbox"   class="conchkNumber_news_form"/>
											<span class="lbl"></span>
										</label> 
									</td>
									<?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
									<td><a href="/<?="$domain/news/{$row['la']}/{$row['id']}/".insert_dash($row['name'])?>" target="_blank"><?=$row['name']?></a></td>
									
									<td><a href="/<?=$domain?>" target="_blank"><?=$row['site']?></a></td>
									<td><?=$row['la']?></td>
									<td>
										<?if($_SESSION["can_delete"]==1){?>	
										<a href="#" id="<?=$id?>" class="del_reated_news red" data-title="delete" data-toggle="modal" data-target="#del_reated_news" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 5px 0 5px;">
											<i class="ace-icon fa fa-trash-o bigger-120" title="<?=$view_delete?>"></i>
										</a>
										<?}?>
									</td>
								</tr>
				<?$i++;}$j++;}?>
				
<!-- show hide click checkbox icon delete group -->				
<script type="text/javascript">
$(function () {	
	$('.conchkSelectAll_form').click( function() {
		$('.conchkNumber_news_form').prop('checked', $(this).is(':checked'));
    });
	$('.conchkNumber_news_form').click( function() {
        if($('.conchkNumber_news_form:checked').length == $('.conchkNumber_news_form').length) {
			$('.conchkSelectAll_form').prop('checked', true);
        }
        else {
          $('.conchkSelectAll_form').prop('checked', false);
        }
    });
	
	////////////
	$("#dropdelete").hide();
	$(".conchkNumber_news_form").click(function() {
		if($(this).is(":checked")) {
			$("#dropdelete").show();
		} else {
			$("#dropdelete").hide();
		}
	});
	$("#dropdelete").hide();
	$(".conchkSelectAll_form").click(function() {
		if($(this).is(":checked")) {
			$("#dropdelete").show();
		} else {
			$("#dropdelete").hide();
		}
	});
});
</script>						
						</tbody>
					</table>	
					<input hidden value="<?=$totla_related?>"  id="totla_related" name="totla_related" >	
				<?			
}



    if($action=='login_user_member'){   
		$query="SELECT la,mobile,type,id,user_name,name,family from new_members where user_name='$id'";
		$result = $coms_conect->query($query);
		$row = $result->fetch_assoc();
		$_SESSION["new_okusername"]=$id; 
	 	$_SESSION["new_username"]=$row['user_name'];
		$_SESSION["new_name"]=$row['name'];
		$_SESSION["new_family"]=$row['family'];
		$_SESSION["new_usertype"]=$row['type'];
		$_SESSION["new_userid"]=$row['id'];
		$_SESSION["new_usermobile"]=$row['mobile'];
		echo 'http://'.$_SERVER['HTTP_HOST'].'/profile/'.$row['la'];
	} 
  

    if($action=='login_user_manager'){   
		$query="SELECT * from new_managers where user_name='$id'";
	 	$result = $coms_conect->query($query);
		$row1 = $result->fetch_assoc();
          $id=$row1['id'];
          $_SESSION["manager_id"]=$id;
          $_SESSION["can_delete"]=$row1['can_delete'];
          $_SESSION["manager_parent_id"]=$row1['parent_id'];
          $_SESSION["can_edit"]=$row1['can_edit'];
          $_SESSION['manager_mobile']=$row1['mobile'];
          $_SESSION['manager_group']=$row1['group_id'];
          $_SESSION["manager_email"]=$row1['email'];
          $_SESSION["manager_user_name"]=$row1['user_name'];
          $_SESSION["manager_name"]=$row1['name'];
          $_SESSION["can_add"]=$row1['can_add'];
          $_SESSION["manager_group_id"]=$row1['group_id'];
          $manager_group=$row1['group_id'];
		  
		  #########################lang########################
          $query="SELECT lang_id,title from new_manage_lang a ,new_language b  where  a.lang_id=b.id and manager_id='$id' and type='l'";
          $result = $coms_conect->query($query);
          $lang=array();
          $site=array();
          while($row = $result->fetch_assoc()) {
            $lang[]=$row['lang_id'];
            $lang_title[]=$row['title'];
      }
          $_SESSION["manager_lang"]=$lang;
          $_SESSION["manager_title_lang"]=$lang_title; 
		 ##########################site##########################
          $query="SELECT lang_id,name from new_manage_lang a,new_subsite b  where a.lang_id=b.id and manager_id='$id' and type='s'";
			
		$result = $coms_conect->query($query);
           while($row = $result->fetch_assoc()) {
            $site[]=$row['lang_id'];
            $site_title[]=$row['name'];
          }
          $_SESSION["manager_site"]=$site;
          $_SESSION["manager_title_site"]=$site_title;
		 
   
          #######################page_cat#############################
          $query="SELECT menu_id from new_cat_permission where group_id=$manager_group and permission=1";
		 
          $result = $coms_conect->query($query);
          $menu_id[0]=-1;$menu_str='';$i=1;$str='';
          while($row = $result->fetch_assoc()) {
            $menu_id[]=$row['menu_id'];
            if($i!=1)$str=',';
            $menu_str .=$str.$row['menu_id'];$i++;
          }
          $_SESSION["manager_page_cat"]=$menu_id;
          $_SESSION["manager_page_cat_str"]=$menu_str;
           
          #######################  page_catogory  #############################
          $query="SELECT a.id FROM new_modules a,new_modules_cat b,new_menu_permission c where c.permission=1 and c.group_id=$id  and a.unic_id=c.menu_id and a.id=b.type group by a.id";
          
          $result = $coms_conect->query($query);
          while($row = $result->fetch_assoc()) {
            $page_catogory[]=$row['id'];
          }
          $_SESSION["manager_page_catogory"]=$page_catogory;
          //print_r($_SESSION["manager_page_catogory"]);exit;
          ###########################menu_permission#################
          $query="SELECT id from new_menu_permission a ,new_main_menu b where a.menu_id=unic_id and permission=1 and a.group_id=$manager_group";
          //echo $query;exit;
          $result = $coms_conect->query($query);
          while($row = $result->fetch_assoc()) {
            $menu_permission[]=$row['id'];
          }
          $_SESSION["menu_permission"]=$menu_permission;
		
          ##########################user_parrents##############################
          $_SESSION["manager_user_permisson_id"]='';
          $temp_user=explode("^",(check_parrent_permission($id,$coms_conect,$temp,0)));
          $conter=count($temp_user);
          $conter--;
          $temp_user[$conter]=$id;
          $_SESSION["manager_user_permisson"]=$temp_user;
          $str="";$i=1;$temp='';
              foreach ($_SESSION["manager_user_permisson"] as $val){
                if($i!=1)$str=","; $temp .="$str".$val;$i++;
                //echo $val.$i.'<br>';
              }
          $_SESSION["manager_user_permisson_id"]=$temp; 
			$_SESSION["manager_user_permisson_string"]= implode(",",$_SESSION["manager_user_permisson"]); 		  
          ########################gruop_pareents########################3333
          $group_user=explode("^",(get_group_parrent($_SESSION["manager_group_id"],$coms_conect,$temp,0)));
          $conter=count($group_user);
          $conter--;
          $group_user[$conter]=$_SESSION["manager_group_id"];
          $_SESSION["manager_group_permisson"]=$group_user;

          ################################manage folderr##########################
          $manager_folder=(explode("^",(create_manager_folder($_SESSION["manager_user_name"],$_SESSION["manager_parent_id"],$coms_conect,$qaz))));
          $manager_fold=array_reverse($manager_folder);
          array_shift($manager_fold);
          $cont=count($manager_fold);
          $manager_fold[$cont]=$_SESSION["manager_user_name"];
          $i=0;
          foreach ($manager_fold as $key=>$value){
          //echo $value.'<br>';
            if($i==0)
            $str11 .=$value;
            else
            $str11 .='/'.$value ;
            $i++;
          }
          $_SESSION["manager_folder_path"]=$str11;
          $_SESSION['RF']["subfolder"]=$_SESSION["manager_folder_path"];
		  
		
		echo 'http://'.$_SERVER['HTTP_HOST'].'/newcoms.php?yep=new_Dashboard';
	} 
  

 
  
	
  
if($action=='cut_site_module'){
	
	$table=get_modual_table($_SESSION['modual_type']);
	 
	$temp=explode(",",$value);
    foreach ($temp as $val){
      $sql="select user_id,la,site from $table where id=$val";
	  //echo $sql;
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
      check_lang_title($row["site"],$_SESSION["manager_title_site"]);
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
      sign_out();
      else{
        $query1="update $table set site='$id' where id=$val"; 
        $coms_conect->query($query1);
        echo $query1;
      }
   }  
}  
if($action=='copy_site_module'){
	$site_id="$id";
	$table=get_modual_table($_SESSION['modual_type']);
	 
	$temp=explode(",",$value);
    foreach ($temp as $val){
      $sql="select user_id,la,site from $table where id=$val";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
      check_lang_title($row["site"],$_SESSION["manager_title_site"]);
      if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
      sign_out();
      else{
         $sql1 = "SELECT * FROM $table WHERE id=$val" ;
		$result1 = $coms_conect->query($sql1);
        $row1 = $result1->fetch_assoc();
        $coms_conect->query("INSERT INTO $table (`id`) VALUES (NULL)");
        $newid =mysqli_insert_id($coms_conect);
		 
        $query = "UPDATE $table SET ";
        foreach ($row1 as $key => $valueee) {
          if ($key != 'id') {
            $query .= '`'.$key.'` = "'.str_replace('"','\"',$valueee).'", ';
          }
        } 
        $query = substr($query,0,strlen($query)-2);
        $query .= " WHERE id={$newid}";
      	 $coms_conect->query($query);
        $query1="update $table set site='$site_id' where id={$newid}"; 
        $coms_conect->query($query1);
        #######################ÏÓÊå ÈäÏí#########################
        $sql="select cat_id from new_modules_catogory where page_id=$val and type={$_SESSION['modual_type']}";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $cat=$row['cat_id'];
          $query1="insert into new_modules_catogory(cat_id,page_id,type) 
          values ('$cat',{$newid},{$_SESSION['modual_type']})";
          $coms_conect->query($query1);
      }
        #######################ÇÎÈÇÑ ãÑÊÈØ#########################
        $sql="select id from new_related_madual where page_id=$val and type={$_SESSION['modual_type']}";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $id=$row['id'];
          $query1="insert into new_related_madual(id,page_id,type) 
          values ('$id',{$newid},{$_SESSION['modual_type']})";
          $coms_conect->query($query1);
      }        #######################ÇÎÈÇÑ ãÑÊÈØ#########################
        $sql="select id from new_catalog_brand_related where page_id=$val and type={$_SESSION['modual_type']}";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $id=$row['id'];
          $query1="insert into new_catalog_brand_related(id,page_id,type) 
          values ('$id',{$newid},{$_SESSION['modual_type']})";
          $coms_conect->query($query1);
      }
        #######################˜áãÇÊ ˜áíÏí#########################
        $sql="select label_id from new_mudoal_label where id=$val and type={$_SESSION['modual_type']}";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $label_id=$row['label_id'];
          $query1="insert into new_mudoal_label(label_id,id,type) 
          values ('$label_id',{$newid},{$_SESSION['modual_type']})";
          $coms_conect->query($query1);
      }
        #######################ÊÕÇæíÑ æ ÇÏÑÓ ÝÇíáåÇ#########################
        $sql="select adress,name from new_file_path where id=$val and type={$_SESSION['modual_type']}";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $name=$row['name'];
        $adress=$row['adress'];
          $query1="insert into new_file_path(adress,name,id,type) 
          values ('$adress','$name',{$newid},{$_SESSION['modual_type']})";
          $coms_conect->query($query1);
      }
        #######################íÏãÇä#########################
        $sql="select sort_id from new_static_page_sort where page_id=$val and type='n'";
        $result = $coms_conect->query($sql);
        while($row = $result->fetch_assoc()) {
        $sort_id=$row['sort_id'];
          $query1="insert into new_static_page_sort(page_id,sort_id,type) 
          values ({$newid},$sort_id,'p')";
          $coms_conect->query($query1);
          //echo $query1;
        }
          
      }
    }  
  }  
  
 


  
  if($action=='recover_manager'&&$manager_user_name='comsroot'){
  $time='NOW()';
  $condition="id=$id";
    $arr=array("del_viwe"=>1,"status"=>1,"edit_date"=>$time,"edit_user_id"=>$manager_id,"ip"=>$custom_ip);
    update_data_base($arr,'new_managers',$condition,$coms_conect);
  
    /*$query1="update new_managers set del_viwe=1,status=1,edit_date=NOW(),edit_user_id=$manager_id,ip='$custom_ip' where id=$id"; 
    $coms_conect->query($query1);*/
    //echo $query1;
  }
  
  if($action=='del_backup'&&$can_delete==1&&$_SESSION["del_item"]==$action){
      $sql="select name from new_backup where id=$id";
      echo $sql;
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      $name=$row['name'];
      unlink("db_backup/$name.sql");
      $query1="delete from new_backup where id='$id'"; 
      $coms_conect->query($query1);
  }  

  if($action=='del_lang'&&$can_delete==1&&$_SESSION["del_item"]==$action){
      $sql="select title from new_language where id=$id";
        $result = $coms_conect->query($sql);
        $row = $result->fetch_assoc();
      $title=$row['title'];
      
    if(check_lang_title($title,$_SESSION['manager_title_lang'])==1){
      $query1="delete from new_language where id='$id'"; 
      $coms_conect->query($query1);
      unlink("languages/$title.php");
      $query1="delete from new_main_menu where la='$title'"; 
      $coms_conect->query($query1);
    }
    
  }
  

  if($action=='del_keyword'&&$can_delete==1&&$_SESSION["del_item"]==$action){
    $temp=explode(",",$id);
    foreach ($temp as $value){
      if(get_result("select key_count from new_keyword where id=$value",$coms_conect)==0){
      $query1="delete from new_keyword where id='$value'"; 
      $coms_conect->query($query1);
      }
    }  
  }  
      
  if($action=='edit_lang'&&$can_edit==1&&$_SESSION["edit_item"]==$action){
    $sql="select status,align,name,title,id from new_language where id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id=$row['id'];
    $name=$row['name'];
    $status=$row['status'];
    $align=$row['align'];
    $title=$row['title'];
    if(check_lang_title($title,$_SESSION['manager_title_lang'])==1)
    echo "$name^$title^$id^$align^$status";
  }

  if($action=='del_new_main_menu'&&$can_delete==1&&$_SESSION["del_item"]==$action){
    $sql="select count(id) as count from new_main_menu where parent_id=$id";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $count=$row['count'];

    if($count>0)
    echo 0;
    else if($count<1){
      $query1="delete from new_main_menu where id='$id'"; 
      $coms_conect->query($query1);
      echo 1;
    }  
  }
   
  if($action=='del_new_faq'&&$can_delete==1&&$_SESSION["del_item"]==$action){
	  $temp=explode(',',$id);
	  foreach($temp as $val){
		$query1="delete from new_faq where id='$val'"; 
        $coms_conect->query($query1);
	  }
  }
  
  if($action=='del_new_question'&&$can_delete==1&&$_SESSION["del_item"]==$action){
	   $temp=explode(',',$id);
	  foreach($temp as $val){
		$query1="delete from new_question where id='$val'"; 
		$coms_conect->query($query1);
	  }
  }  
 
    
  if($action=='check_lang'){
    $sql="select count(id) as count from new_language where title='$id'";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $count=$row['count'];
    echo $count;
  }
  
  if($action=='check_subsite'){
    $sql="select count(id) as count from new_subsite where name='$id'";
    //echo $sql;exit;
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $count=$row['count'];
    echo $count;
  }
  if($action=='check_block_name'){
    $sql="select count(id) as count from new_blocks where title='$id'";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    echo $row['count'];
  }
  if($action=='check_block_sort_name'){
    $sql="select count(id) as count,id,name from new_blocks_sorts where name='$id' and la='$secend_value'";
   // echo $sql;
	$result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    //echo $row['id']."$value".$row['name'].$id;
    if($row['id']==$value&&$row['name']==$id)
    echo 0;
    else
    echo $row['count'];
  }
  if($action=='check_page_name'){
    $sql="select count(id) as count,id,name from new_static_page where name='$id'";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if($row['id']==$value&&$row['name']==$id)
    echo 0;
    else
    echo $row['count'];
  }  
  
  if($action=='check_manager_moblie'){
      $sql="select count(id) as count,id,mobile from new_managers where mobile='$id'";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if($row['id']==$value&&$row['mobile']==$id)
      echo 0;
      else
      echo $row['count'];
  }
  
  if($action=='check_manager_email'){
      $sql="select count(id) as count,id,email from new_managers where email='$id'";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if($row['id']==$value&&$row['email']==$id)
      echo 0;
      else
      echo $row['count'];
  }
  
    if($action=='change_index_pagename'){
      $sql="select value,contraction from new_first_page_setting where la='$id' and site='$value'";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      echo $row['value'].'^'.$row['contraction'];
  }
  
  if($action=='check_group_access'){
      $sql="select count(id) as count,id,name from new_groups where name='$id'";
	  $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if($row['id']==$value&&$row['name']==$id)
      echo 0;
      else
      echo $row['count'];
  }
  
  if($action=='check_manager_username'){
      $sql="select count(id) as count,id,user_name from new_managers where user_name='$id'";
      $result = $coms_conect->query($sql);
      $row = $result->fetch_assoc();
      if($row['id']==$value&&$row['user_name']==$id)
      echo 0;
      else
      echo $row['count'];
  }

  
    if($action=='edit_new_site'&&$can_edit==1&&$_SESSION["edit_secend_item"]==$action){
      $query1="update new_main_menu set status=$value where unic_id=$id"; 
      $coms_conect->query($query1);
      //echo $query1;
    }
    if($action=='edit_new_faq'&&$can_edit==1&&$_SESSION["edit_item"]==$action){
      $query1="update new_faq set mudoal_lock=$value where id=$id"; 
	  echo $query1;
      $coms_conect->query($query1);
    }	
	
    if($action=='edit_new_question'&&$can_edit==1&&$_SESSION["edit_item"]==$action){
      $query1="update new_question set mudoal_lock=$value where id=$id"; 
	  echo $query1;
      $coms_conect->query($query1);
    }	

 
	
  if($action=='show_city_ads'){
    $sql="select name,id from new_regional where parent_id=$id and type=3";
	 $result = $coms_conect->query($sql);
	 echo "<select name='city' id='city' class='form-control'>";
	  while($row = $result->fetch_assoc()) {
		echo "<option value='{$row['id']}'>{$row['name']}</option>";
	  }
	  echo '</select>';
  }


	
	function check_brother($parent_id,$coms_conect,$la){
		$sql = "SELECT count(id) as brother_count FROM new_modules_cat WHERE parent_id='$parent_id' and type='{$_SESSION["edit_item"]}'  and la='$la'";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		return $row['brother_count'];
	}
	
	function get_cat_child ($id,$coms_conect,$la){
		$sql = "SELECT id,parent_id FROM new_modules_cat WHERE parent_id='$id' and type='{$_SESSION["edit_item"]}'  and la='$la'";
		$result = $coms_conect->query($sql);
		while($row = $result->fetch_assoc()) {
			$id=$row['id'];
			$_SESSION["father_car_arr"] .=$id.'#';
			 get_cat_child ($id,$coms_conect,$la);
		}
	 
	}
	
	function get_cat_father ($parent_id,$coms_conect,$la){
		$sql = "SELECT parent_id,id FROM new_modules_cat WHERE id='$parent_id' and type='{$_SESSION["edit_item"]}'  and la='$la'";
		$result = $coms_conect->query($sql);
		while($row = $result->fetch_assoc()) {
			$parentid=$row['parent_id'];
			$id=$row['id'];
			if(check_brother($parent_id,$coms_conect,$la)<2){
			  get_cat_father ($parentid,$coms_conect,$la);
			 $_SESSION["father_car_arr"] .=$row['id'].'#';
			}
		}
		
	}	
	 
    if($action=='edit_cat_status'&&$can_edit==1){
		$_SESSION["father_car_arr"]='';
		$cat_la=get_result("select la from new_modules_cat where id = '$id'",$coms_conect);
		$parent_id=get_result("select parent_id from new_modules_cat where id = '$id'",$coms_conect);
		get_cat_child ($id,$coms_conect,$cat_la);
		get_cat_father ($parent_id,$coms_conect,$cat_la);
		$_SESSION["father_car_arr"] .=$id;
		$temp=explode('#',$_SESSION["father_car_arr"]);	
		foreach($temp as $val){
		   $query1="update new_modules_cat set status=$value where id=$val"; 
			$coms_conect->query($query1);	
		}
      echo $_SESSION["father_car_arr"]; 
    }
    
if($action=='edit_new_manebar'&&$can_edit==1&&$_SESSION["edit_secend_item"]==$action){
      $query1="update new_menu set status=$value where unic_id=$id"; 
      $coms_conect->query($query1);
      //echo $query1;
    }
    

    if($action=='disable_user'){
    $sql="select  site from new_members where id=$id";
    $result1 = $coms_conect->query($sql);
    $RS11 = $result1->fetch_assoc();
      check_lang_title($RS11["site"],$_SESSION["manager_title_site"]);
      if($can_edit!=1)
      sign_out();
      else{
        $query1="update new_members set status=$value where id=$id"; 
        $coms_conect->query($query1);
        echo $query1;
      }
    }    
    
  if($action=='disable_manager'){
    if(($can_edit!=1&&!in_array ($id,$_SESSION["manager_user_permisson"]))||($id==1))
      sign_out();
      else{
        $query1="update new_managers set status=$value where id=$id"; 
        $coms_conect->query($query1);
        echo $query1;
      }
  }  

if($action=='change_manager_pm_status'){
    $query1="update new_manager_pm set status=$value where id=$id"; 
    $coms_conect->query($query1);
} 

  
    if($action=='edit_manager'&&$_SESSION['can_edit']==1&&$_SESSION["edit_item"]==$action){
    $_SESSION['manager_lang_arr']='';
      $query="select can_draft,status,avatar,semat,mobile,phone,phone_code,address,id,name,user_name,email,group_id,can_add,can_delete,can_edit,parent_id,expire_date from new_managers where id =$id";
      $result = $coms_conect->query($query);
      $RS1 = $result->fetch_assoc();
      $user_id=$RS1["id"];
        $query1="select lang_id from new_manage_lang where manager_id=$user_id and type='s'";
        $result1 = $coms_conect->query($query1);
        $RS11 = $result1->fetch_assoc();
        $temp=array();
        $query12="select lang_id from new_manage_lang where manager_id=$user_id and type='l'";
        $result12 = $coms_conect->query($query12);
        $temp="$";
        while($RS121 = $result12->fetch_assoc()) {
          $temp .=$RS121["lang_id"].',';
        }
      

        function users_child($new_id,$coms_conect,$id){
        $query="SELECT id from new_managers where parent_id='$new_id'";
        $result = $coms_conect->query($query);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if($row['id']==$id){
              //echo $row['id']."==$id<br>";
              return null;
              }else
              users_child($row['id'],$coms_conect,$id)  ;
            }
          }else
        echo 'qaz';          
        }
        $date=miladitojalaliuser($RS1["expire_date"]);
        echo $RS1["name"].'^'.$RS1["user_name"].'^'.$RS1["email"].'^'.$RS1["group_id"];
        echo '^'.$RS1["can_add"].'^'.$RS1["can_delete"].'^'.$RS1["can_edit"].'^'.$date.'^'.$RS11["lang_id"];
        echo '^'.$user_id.'^'.$temp.'^'.$RS1["semat"].'^'.$RS1["mobile"].'^'.$RS1["phone"].'^'.$RS1["phone_code"].'^'.$RS1["address"].'^'.$RS1["avatar"].'^'.$RS1["status"].'^'.$RS1['can_draft'];
      //}  
    }
    


  if($action=='show_related_product'){
		echo '
          <table  cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
            <thead>
              <tr>
            
                <th class="center"><label class="position-relative"><input type="checkbox" class="conchkSelectAll_news" /><span class="lbl"></span></label></th>
                   <th>'.$view_title_product.' </th>
               
                <th>ID</th>
                
              </tr>
              
            </thead>
            
            <tbody>';
  $query2="select a.title ,a.id from new_managers b ,new_product a ,new_modules_catogory c where (a.text like '%$id%' or  a.title like '%$id%' )  and a.status=1 and b.id = a.user_id and c.type=4 and a.id=c.page_id group by a.id";
  
 $result2 = $coms_conect->query($query2);
    while($RS2 = $result2->fetch_assoc()) {
    echo '  <tr>
        <th class="center"><label class="position-relative">
        <input type="checkbox" value="'.$RS2['id'].'" class="conchkNumber_news"/><span class="lbl"></span></label></th>
      
        <td>'.$RS2["title"].'</td>
        <td>'.$RS2["id"].'</td>
      </tr>';
  }
  echo  '</tbody>
      </table>';

  }  
  

  ################# x-editable status new_news ####################
  $page_id=injection_replace($_GET['pk']);    // in pk locate page_id param
  $action=injection_replace($_GET['name']);     // name: field name
  $status=injection_replace($_GET['value']);    // value of select tag
  
  if($action=='change_status_news'){
	$condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_news',$condition,$coms_conect);
  }  
  
   if($action=='change_status_content'){
	$condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_content',$condition,$coms_conect);
  } 
 
  
  if($action=='change_manager_email'){
	$condition="id={$_SESSION['manager_id']}";
    $arr_status_news=array("email"=>$status);
    update_data_base($arr_status_news,'new_managers',$condition,$coms_conect);
  }    
  if($action=='change_manager_name'){
	$condition="id={$_SESSION['manager_id']}";
    $arr_status_news=array("name"=>$status);
    update_data_base($arr_status_news,'new_managers',$condition,$coms_conect);
  }   

  if($action=='change_manager_mobile'){
	$condition="id={$_SESSION['manager_id']}";
    $arr_status_news=array("mobile"=>$status);
    update_data_base($arr_status_news,'new_managers',$condition,$coms_conect);
  }    
  
  if($action=='change_manager_phone'){
	$condition="id={$_SESSION['manager_id']}";
    $arr_status_news=array("phone"=>$status);
    update_data_base($arr_status_news,'new_managers',$condition,$coms_conect);
  } 
  if($action=='change_manager_address'){
	$condition="id={$_SESSION['manager_id']}";
    $arr_status_news=array("address"=>$status);
    update_data_base($arr_status_news,'new_managers',$condition,$coms_conect);
  }    
  
 

  if($action=='change_status_product'){
	  $condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_product',$condition,$coms_conect);
  }  
  if($action=='change_status_article'){
    $condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_article',$condition,$coms_conect);
  }   
 
  if($action=='change_status_downlaod'){
    $condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_download',$condition,$coms_conect);
  } 
 
  if($action=='change_status_page'){
    $condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_static_page',$condition,$coms_conect);
  }   
  if($action=='change_status_lang'){
    $condition="id=$page_id";
    $arr_status_news=array("status"=>$status);
    update_data_base($arr_status_news,'new_language',$condition,$coms_conect);
  }
?>

