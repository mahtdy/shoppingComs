<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Image Upload and Resize it using PHP - Learn Infinity</title>
    
    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
	.li-post-group {
		background: #f5f5f5;
		padding: 5px 10px;
		border-bottom: solid 1px #CFCFCF;
		margin-top: 5px;
	}
	.li-post-title {
	    border-left: solid 4px #304d49;
	    background: #a7d4d2;
	    padding: 5px;
	    color: #304d49;
	    margin: 0px;
	}
	.show-more {
	    background: #10c1b9;
	    width: 100%;
	    text-align: center;
	    padding: 10px;
	    border-radius: 5px;
	    margin: 5px;
	    color: #fff;
	    cursor: pointer;
	    font-size: 20px;
	    display: none;
	    margin: 0px;
    	margin-top: 25px;
	}
	.li-post-desc {
	    line-height: 15px !important;
	    font-size: 12px;
	    box-shadow: inset 0px 0px 5px #7d9c9b;
	    padding: 10px;
	    margin: 0px;
	}
	.panel-default {
	    margin-bottom: 100px;
	}
	.post-data-list {
	    max-height: 374px;
	    overflow-y: auto;
	}
	.radio-inline {
	    font-size: 20px;
	    color: #c36928;
	}
	.progress, .progress-bar{ height: 40px; line-height: 40px; display: none; }

	#post_list li
   {
    border: 1px solid #a7d4d2;
    cursor: move;
    margin-top:10px;
   }
   #post_list li.ui-state-highlight {
    padding: 20px;
    background-color: #eaecec;
    border: 1px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    }
    .form-alter{ display:none1; }

	</style>
</head>
<body>
    <div class="all-content-wrapper">
		<!-- Top Bar -->
		<?php require_once('./include/header.php'); ?>
		<!-- #END# Top Bar -->
	
		<section class="container">
			<div class="form-group custom-input-space has-feedback">
				<div class="page-heading">
					<h3 class="post-title">Image Upload and Resize it using PHP - Learn Infinity</h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading">Image Upload and Resize it:</div>
								<div class="panel-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group col-md-6">
											<label class="required">Width</label>
											<input type="number" name="new_width" required />
										</div>

										<div class="form-group col-md-6">
											<label class="required">Height</label>
											<input type="number" name="new_height" required />
										</div>

										<div class="form-group">
											<label class="required">Choose Image</label>
											<input type="file" name="upload_image" required />
										</div>
										
										<input type="submit" name="form_submit" class="btn btn-primary" value="Submit" />
									</form>

<?php
function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

if(isset($_POST["form_submit"])) {
	$imageProcess = 0;
    if(is_array($_FILES)) {
        $new_width = $_POST['new_width'];
        $new_height = $_POST['new_height'];
        $fileName = $_FILES['upload_image']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;

            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($fileName, $uploadPath. $resizeFileName. ".". $fileExt);
        $imageProcess = 1;
    }

	if($imageProcess == 1){
	?>
		<div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
			<i class="fa fa-fw fa-check-circle"></i>
			<strong> Success ! </strong> <span class="success-message"> Image Resize Successfully </span>
		</div>
		
		<hr/>
		
		<div class="row">
			
			<div class="col-md-4">
				<img class="img-rounded img-responsive" src="<?php echo $uploadPath."thump_".$resizeFileName.'.'. $fileExt; ?>" width="<?php echo $new_width; ?>" height="<?php echo $new_height; ?>" >

				<h4><b>Thump Image</b></h4>

				<a href="<?php echo $uploadPath."thump_".$resizeFileName.'.'. $fileExt; ?>" download class="btn btn-danger"><i class="fa fa-download"></i> Download </a href="">
			</div>
			<div class="col-md-8">
				<img class="img-rounded img-responsive" src="<?php echo $uploadPath.$resizeFileName.'.'. $fileExt; ?>" >

				<h4><b>Original Image</b></h4>
			</div>
		</div>

	<?php
	}else{
	?>
		<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
			<i class="fa fa-fw fa-times-circle"></i>
			<strong> Note !</strong> <span class="warning-message">Invalid Image </span>
		</div>
	<?php
	}
	$imageProcess = 0;
}
?>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
    </div>
	
	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script>

	</script>
</body>
</html>
