<?php
$id_pro=$_POST['id_pro'];
if(isset($id_pro)&& $id_pro>''){
    $query_moj="select * from new_product_price_date WHERE id_pro='$id_pro' ";
//    echo $query_moj;
    $result_moj = $coms_conect->query($query_moj);
   while ($RS1_moj = $result_moj->fetch_assoc()){
       $dataPoints=array(
           array("y" => $RS1_moj['new_date'], "label" =>$RS1_moj['new_date']));
   }
}

$dataPoints = array(
    array("y" => 25, "label" => $RS1_moj['new_date']),
    array("y" => 15, "label" => "Monday"),
    array("y" => 25, "label" => "Tuesday"),
    array("y" => 5, "label" => "Wednesday"),
    array("y" => 10, "label" => "Thursday"),
    array("y" => 0, "label" => "Friday"),
    array("y" => 20, "label" => "Saturday")
);

?>
<!DOCTYPE HTML>
<html>
<head>
	<script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "تمامی قیمت های محصول "
                },
                axisY: {
                    title: "نرخ قیمت"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
	</script>
</head>
<body>
<div id="chartContainer" ></div>
<script src="../yep_theme/default/rtl/js/chart/canvasjs.min.js"></script>
<!--<script src="../yep_theme/default/rtl/js/chart/canvasjs.react.js"></script>-->
<script src="../yep_theme/default/rtl/js/chart/jquery.canvasjs.min.js"></script>
</body>
</html>