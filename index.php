<?php

    require('fpdf184/fpdf.php');

    $pdf = new FPDF();

   
    $pdf->AddPage();
    $pdf->SetFont('Arial','',12);
    $pdf->Image('logo.png',10,5,80,30,'PNG', "https://shopacer.co.za/");
    $pdf->Ln(25);
    $pdf->cell(150, 5, 'Tax Invoice',0,0, 'R');
    $pdf->cell(40, 5, ': #20220704AZ1',1,1, 'R');
    $pdf->Ln(10);
    $pdf->cell(20, 5, 'Date',0,0, 'L');
    $pdf->cell(30, 5, ': 2022-07-04',0,1, 'R');
    $pdf->Ln(10);
    $pdf->cell(20, 5, 'Tax invoice to',0,1, 'L');
    $pdf->cell(150, 5, 'Name',0,0, 'R');
    $pdf->cell(30, 5, ': Zweli',0,0, 'R');
    $pdf->Ln(100);
    $pdf->Line(10, 30, 200,30);
    $pdf->Ln(100);
    $pdf->cell(100, 5,'',0,1);
    

    zcbdh
 
    

    $pdf->Output();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>