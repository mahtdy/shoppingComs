<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('کتابخانه فناوری اطلاعات');
$mpdf->SetWatermarkText('ITLIBRARY.IR');
$mpdf->showWatermarkText = true;
$mpdf->Output();