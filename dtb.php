<?php
    

        $userName = "root";
        $host = "localhost";
        $password = "";
        $dbName = "invoices";


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
        

        $arr = json_decode($row[0]['item'], true);

       /* 
       // print_r($arr[0]['product']);
        echo "<pre>";
        print_r($arr);
        echo "<pre/>";


        echo count($arr[0])."<br/>";


        for($i = 0; $i < count($arr); $i++)
        {

            echo "Quantity: " . $arr[$i]['qty']."<br/>";
            echo "SKU: " .$arr[$i]['SKU']."<br/>";
            echo "Product: " .$arr[$i]['product']."<br/>";
            echo "Price ex vat: " .$arr[$i]['price']."<br/><br/>";
           
        }
      

    /*foreach ($row as $rows){


    $lineCount +=5;
    
    $arr = json_decode($rows['item'], true);

    
    $priceExVat = ($rows['amount']); //single product amount  
    $qty = $arr['qty'];
    $lineTotal = $rows['amount'] * $qty;

    $total += $lineTotal;

    $x = 0;
foreach ($arr as  $data[]){ // products iterator


    echo "Quantity: " . $data['qty']."<br/>";
    echo "SKU: " .$data[1]."<br/>";
    echo "Product: " .$data[2]."<br/>";
    echo "Price ex vat: " .$data['priceExVat']. "<br/>";
}

//print_r($arr);

}*/

$vat = ($total *1.15) - $total;
$total += $vat;
/*echo "VAT: " ."R".round( $vat)."<br/>";
echo "Total: " ."R".round( $total)."<br/>";*/