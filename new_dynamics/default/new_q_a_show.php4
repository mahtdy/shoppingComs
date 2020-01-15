           <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
                <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg">
            </section>
			<?$sql12 = "SELECT a.answer,a.question,b.name   from new_q_a a ,new_q_a_cat b where a.id=$faqq and b.id=a.cat_id and a.site='$defult_site' and a.la='$defult_lang' and a.status=1";
			$resultd1 = $coms_conect->query($sql12);
			$row = $resultd1->fetch_assoc();
			?> 
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_faq2?></li>
                    </ol>
                </div>
            </section>
  
        <!-- End Header -->
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-lightbulb-o"></span>

                <h1 class="title"><?=$view_faq2?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>

            </div>
        </div>
        <!-- End Page Title -->
        <div class="container">
            <main>
                <!-- Start Main -->
                <div class="row faq">
                    <div class="col-xs-12 item">
                        <h5><?=$view_sub_question?> <?=$row['name']?></h5>
                        <h4><?=$row['question']?></h4>
                        <p>
                           <?=$row['answer']?>
                        </p>
                    </div>
                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
        <!-- Filehaye safhe------------------------------------------------------------------>
        <!-- Filehaye safhe------------------------------------------------------------------>