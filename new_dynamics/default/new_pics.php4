
<!--<script src="../../yep_theme/js/jquery-3.3.1.min.js"></script>-->
<!--<script src="../../yep_theme/js/select2.min.js"></script>-->
<!--<script src="../../yep_theme/js/jquery.js" type="text/javascript"></script>-->


<?if(time()>=$_SESSION['count']+2){
    $query1="update new_gallery set view=view+1 where id='$madual_id'";
    $coms_conect->query($query1);
    view_module(9,$coms_conect);
}
$_SESSION['count']=time();
#####نوع ماژول
$comment_type=9;
if($site=='main')
    include 'new_dynamics/default/new_popup_comment.php4';else
    include '../new_dynamics/default/new_popup_comment.php4';
$sql12 = "SELECT cameraman,pic_source,pic_source_link,la,navication_pic,mudoal_lock,can_comment,id,deatils,title,date,view from new_gallery 
	 where id='$madual_id'  and status=1 and publish_date<=$now ";

$resultd1 = $coms_conect->query($sql12);
$row15 = $resultd1->fetch_assoc();


///////////////////function MAHTDY//////
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

?>
<link rel="stylesheet" href="/yep_theme/css/imgtorgb1.css" />

<div class="container-fluid">
    <div class="row">

        <a href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
            <div class="gtop">
                <span class="fa fa-angle-up animated infinite fadeInUp"></span>
            </div>
        </a>

   <!-- Start Slider -->
        <section class="slider pimg animated fadeIn hidden-xs">
            <img src="/new_template/default/rtl/img/slider1.jpg" alt="گالری تصاویر ">
        </section>
        <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li class="active">گالری تصاویر</li>
                </ol>
            </div>
        </section>
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">
                <span class="fa fa-camera"></span>
                <h1 class="title">گالری تصاویر</h1>
                <span class="pdesc">توضيح مختصر درباره اين صفحه در اينجا نمايش داده مي شود.</span>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container">
            <main>

                <aside class="col-md-12 col-sm-4 col-xs-12 pull-right animated fadeIn">
                    <section class="block-col">
                        <!-- Start Main -->
                        <div class="row gridgallery">

                            <div class="col-xs-12 cat_select_search_show row rtl prl0">
                                <form method="post" id="faq_search">
                                    <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right cat_select pr0">
                                        <h4><span class="fa fa-folder-open"></span>انتخاب موضوع:</h4>
                                        <div class="select2-container select2-container-multi cat-select" id="s2id_modual_cat" style="width: 100%;"><ul class="select2-choices">  <li class="select2-search-field">    <label for="s2id_autogen1" class="select2-offscreen"></label>    <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" id="s2id_autogen1" placeholder="" style="width: 360.008px;">  </li></ul><div class="select2-drop select2-drop-multi select2-display-none">   <ul class="select2-results">   <li class="select2-no-results">No matches found</li></ul></div></div><select name="modual_cat" id="modual_cat" class="cat-select" multiple="multiple" style="width: 100%; display: none;" tabindex="-1">
                                            <option value="71">طبیعت</option><option value="72">مذهبی</option><option value="73">هنری</option>
                                        </select>
                                    </div>

                                    <div class="col-md-8 col-sm-6 col-xs-12 form-group pull-right cat_search row">
                                        <h4><span class="fa fa-search"></span>جستجو:</h4>
                                        <div class="col-xs-8 form-group pull-right">

                                            <input id="faqq" class="form-control" type="text">
                                        </div>
                                        <div class="col-xs-1 form-group pull-right pr0">
                                            <button type="button" id="faq_btn" class="form-control btn btn-success"><span class="fa fa-search"></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script>
                                $("#faqq").keypress(function (e) {
                                    if(e.which==13){
                                        $("#faq_search").attr("action", "/gallery/fa/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
                                        $("#faq_search").submit()
                                    }
                                });
                                $("#faq_btn").click(function () {
                                    $("#faq_search").attr("action", "/gallery/fa/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
                                    $("#faq_search").submit()
                                });
                            </script>
                            <div id="show_result">    <div id="gallery">
                                    <?
                                    $sql = "SELECT * FROM new_image ";
                                    $result = $coms_conect->query($sql);
                                   while ($row = $result->fetch_assoc()){
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh category-small-box H">
                                        <div class="item H theme" >
                                            <a href="" id="href_link" title="<?=$row['id']?>">
                                                <figure id="href_linkuu">
                                                    <img id="" class="hvr-glow H" title="<?=$row['thumbpic']?>" src="<?=$row['thumbpic']?>" alt="<?=$row['thumbpic']?>">
                                                    <label for="" >سایز  : '<?=formatSizeUnits($row['imgsize'])?>' + اندازه : '<?=$row['width'].'*'.$row['height'];?>'</label>
                                                    <ul class="themeBox">
                                                        <?    for($i=0; $i<10; $i++) {?>
                                                        <li draggable="false" aria-haspopup="true" data-index="<?=$j?>" style="background: <?='#'.$row["hex{$i}"]?>">
                                                          <?
                                                            $j++;
                                                            if($j === 10) {
                                                                $j=0;
                                                            }
                                                         }?>
                                                    </ul>
                                                    <span class="fa fa-lock col-md-1 col-md-offset-1" style="bottom: -10px;"></span>
                                                    <h6><?=$row['id']?></h6>
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <?}?>
                              </div>
                                <div class="col-xs-12 moreitemsbtn">
                                    <h4>
                                        <a href="#" id="ajax_pagissssn"><span class="fa fa-plus"></span></a>
                                    </h4>
                                    <input hidden="" id="page_num" value="9">

                                </div>
                            </div>
                            <img id="waiting" src="/waiting.gif" style="display: none;">

                        </div>
                    </section></aside>

                <script>
                    $("#href_link").click(function () {
                        // var hreflink=$('#href_link').attr(title,value);
                        alert('21212');
                        // $.post("new_showpic.php4",{hreflink:hreflink},
                        // function (data) {
                        //
                        // });
                    });
                </script>


            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->


        <link rel="stylesheet" type="text/css" href="/new_template/default/rtl/css/select2/select2.min.css">        <!-- Start Footer -->
        <footer>