<?php

include 'dtb.php';

require('fpdf184/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();



$pdf->SetFont('Arial', '', 12);
$pdf->Image('logo.png', 10, 5, 80, 30, 'PNG', "https://shopacer.co.za/");
$pdf->Line(10, 30, 200, 30);
$pdf->Ln(25);
$pdf->cell(20, 5, 'Date', 0, 0);
$pdf->cell(99, 5, ': '.$date, 0, 0);
$pdf->cell(39, 5, 'Tax Invoice', 0, 0);
$pdf->cell(39, 5, ': #'.$invoiceRef, 0, 1);
$pdf->SetFont('Arial', '', 35);
$pdf->cell(120, 20, '', 0, 0);
$pdf->cell(39, 20,  'R '.round($total,2), 0, 1);
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->cell(120, 5, 'Tax invoice to:', 0, 0, 'L');
$pdf->cell(39, 5, 'Prepared by', 0, 0);
$pdf->cell(36, 5, ': Zweli', 0, 1);
$pdf->cell(36, 5, 'Name', 0, 0);
$pdf->cell(84, 5, ': '.$clientID, 0, 0);
$pdf->cell(40, 5, 'Brand Hubb(Pty) Ltd', 0, 1);
$pdf->cell(36, 5, 'Phone', 0, 0);
$pdf->cell(84, 5, ': 087 151 3400', 0, 0);
$pdf->cell(39, 5, 'Company Reg No.', 0, 0);
$pdf->cell(30, 5, ': 2022/15/45862', 0, 1);
$pdf->cell(36, 5, 'Address', 0, 0);
$pdf->cell(84, 5, ': Sunninghill', 0, 0);
$pdf->cell(39, 5, 'VAT No.', 0, 0);
$pdf->cell(30, 5, ': 46502788555', 0, 1);
$pdf->cell(36, 5, 'Company Reg No.', 0, 0);
$pdf->cell(84, 5, ': 2022/15/45862', 0, 0);
$pdf->cell(39, 5, 'Address', 0, 0);
$pdf->cell(30, 5, ': Sandton', 0, 1);
$pdf->cell(36, 5, 'VAT No.', 0, 0);
$pdf->cell(30, 5, ': 46502788546', 0, 0);
$pdf->Line(10, 100, 200, 100);
$pdf->Ln(15);
$pdf->cell(22, 5, 'Quantity', 0, 0);
$pdf->cell(34, 5, 'SKU', 0, 0);
$pdf->cell(60, 5, 'Item', 0, 0);
$pdf->cell(40, 5, 'Price ex vat', 0, 0);
$pdf->cell(26, 5, 'Line Total', 0, 1);
$pdf->Line(12, 115, 197, 115);


$x = 0;

for($i = 0; $i < count($arr); $i++)
{
//////

    $pdf->cell(22, 5,  $arr[$i]['qty'], 0, 0, 'C');
    $pdf->cell(34, 5,$arr[$i]['SKU'], 0, 0);
    $pdf->cell(60, 5, $arr[$i]['product'], 0, 0);
    $pdf->cell(40, 5, 'R '.round($arr[$i]['price'],2), 0, 0);
    $pdf->cell(26, 5, 'R '.round($arr[$i]['price']*$arr[$i]['qty'],2), 0, 1);
   
$x += $i * 2;

} 


$pdf->Line(12, 200+$x, 197, 200+$x);
$pdf->Ln(80+$x);
$pdf->cell(120, 10+$x, '', 0, 0);
$pdf->cell(40, 10+$x, 'VAT', 0, 0);
$pdf->cell(26, 10+$x, 'R '.round($vat,2), 0, 1);
$pdf->cell(120, 10+$x, '', 0, 0);
$pdf->cell(40, 10+$x, 'TOTAL', 0, 0);
$pdf->cell(26, 10+$x, 'R '.round($total,2), 0, 1);
$pdf->Line(10, 220+$x, 200, 220+$x);
$pdf->Ln(2+$x);
$pdf->cell(123, 5+$x, 'PAYMENT DETAILS:', 0, 0, 'L');
$pdf->cell(39, 5+$x, 'OTHER INFORMATION', 0, 1);
$pdf->cell(39, 5+$x, 'Name of beneficiary', 0, 0);
$pdf->cell(84, 5+$x, ': Brand Hubb', 0, 0);
$pdf->cell(40, 5+$x, 'Shop Acer', 0, 1);
$pdf->cell(39, 5+$x, 'Name of Bank', 0, 0);
$pdf->cell(84, 5+$x, ': Standard Bank', 0, 0);
$pdf->cell(39, 5+$x, 'Phone', 0, 0);
$pdf->cell(30, 5+$x, ': 010 020 8606', 0, 1);
$pdf->cell(39, 5+$x, 'Address of Bank', 0, 0);
$pdf->cell(84, 5+$x, ': Sunninghill', 0, 0);
$pdf->cell(39, 5+$x, 'www.shopacer.co.za', 0, 1);
$pdf->cell(39, 5+$x, 'Account Number', 0, 0);
$pdf->cell(84, 5+$x, ': 35-28-546-1', 0, 0);
$pdf->cell(39, 5+$x, 'zweli@shopacer.co.za', 0, 1);
$pdf->cell(39, 5+$x, 'SWIFT Code', 0, 0);
$pdf->cell(39, 5+$x, ': SB-ZA-ZA-JJ', 0, 1);
$pdf->cell(39, 5+$x, 'Payment reference', 0, 0);
$pdf->cell(84, 5+$x, ': #20220704AZ1', 0, 0);
$pdf->Line(10, 259+$x, 200, 259+$x);


// Position at 4.1 cm from bottom
$pdf->SetY(-41);
// Arial italic 8
$pdf->SetFont('Arial', 'I', 9);
// Text color in gray
$pdf->SetTextColor(128);
$pdf->Cell(0, 10+$x, 'If you have any questions concerning this tax invoice, Contact us on support@shopacer.co.za or 010 020 8606', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
// Page number
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');

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