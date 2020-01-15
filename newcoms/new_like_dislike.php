


<!--                                        //====start===like dislike====-->
<?
$tarikh=time();
$type_madoul=11;
$ip=$_SERVER['REMOTE_ADDR'];
?>
<div class="row">
    <center>
        <div>
            <h3>به این محتوا رای دهید..</h3>
            <label for="" id="like" class="like" type="checkbox">پسندیدم</label>
            <label for="" id="dislike" class="dislike" type="checkbox">نمی پسندم</label>
        </div>
        <div id="jigar">
            <?$sql_like = "SELECT count(like_like)as c_like , (SELECT COUNT(id) FROM new_like_dislike where id_content='$madual_id' AND type_madoul='$type_madoul') as c_id FROM new_like_dislike WHERE like_like=1 AND id_content='$madual_id'";
                 $result_like = $coms_conect->query($sql_like);
            $row_like = $result_like->fetch_assoc();
            $kol=$row_like['c_id'];
            $c_like=$row_like['c_like'];
            $darsad=round(($c_like/($kol))*100);
           ?>
            <label for="" id="avrege" class="averge" type="checkbox"><span id="avrege_darsad"  ><?if ($darsad!=0) echo '%'.$darsad.'</span> این مطلب را پسندیدند';?></label>
        </div>
    </center>
</div>
<script>

    $('#like').click(function () {
        alert('سپاس از اینکه شما این مطلب را پسندیدید..');
        $.ajax({
            type:'POST',
            url:'/../New_ajax_company.php',
            data:"action=oklikelike&likelike=1&type_m=<?=$type_madoul?>&m_id=<?=$madual_id?>&ip_ip=<?=$ip?>&date_date=<?=$tarikh?>",
            success: function(data){
                $('#avrege_darsad').text(data);
                 }
        });
    });
    $('#dislike').click(function () {
        alert('شما این مطلب را نپسندیدید..');
        $.ajax({
            type:'POST',
            url:'/../New_ajax_company.php',
            data:"action=oklikelike&likelike=0&type_m=<?=$type_madoul?>&m_id=<?=$madual_id?>&ip_ip=<?=$ip?>&date_date=<?=$tarikh?>",
            success: function(data){
                $('#avrege_darsad').text(data);
            }
        });
    });
</script>
<!--                                        //====End===like dislike====-->