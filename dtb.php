<?php
    

        $userName = "root";
        $host = "localhost";
        $password = "";
        $dbName = "invoices";

        $x = 0;
        $total = 0;
        $lineTotal = 0;
        $priceExVat = 0;
        $qty = 0;

        try {
            $conn = new PDO("mysql:host=$host;dbname=".$dbName, $userName, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Connection Successfully established";
            
        } catch (PDOException $err) {
            echo"Connection failure: " . $err->getMessage();
        }


        $sql = "SELECT * FROM invoice WHERE invoiceID=1";

        $result = $conn->prepare($sql);
       /* $a = 1;
        $result->bindParam(1, $a);*/

        $result->execute();

        $row = $result->fetchAll(\PDO::FETCH_ASSOC);

        //print_r($row[0]['clientID']);

        $invoiceRef = $row[0]['invoiceID'];
        $date = $row[0]['date'];
        $clientID = $row[0]['clientID'];
       
        $vat = 0;
        $total = 0;


        $arr[] = "";

        $lineCount = 0;
        $lineTotal = 0;
        

       // $arr = json_decode($row[0]['item'], true);

$r = 0;

foreach ($row as $rows){
    $lineCount +=5;
    
    $arr = json_decode($rows['item'], true);


    for($i = 0; $i < count($arr); $i++)
    {
        $priceExVat = ($arr[$i]['price']); //single product amount 
        $qty = $arr[$i]['qty'];
        $lineTotal =  $priceExVat * $qty;
        $total += $lineTotal;
    }
}

$vat = ($total * 1.15) - $total;
$total += $vat;


/*echo "VAT: " ."R".round( $vat)."<br/>";
echo "Total: " ."R".round( $total)."<br/>";*/