<?php

header('Content-Type: application/json');



class DatabaseConnection
{
    public $userName = "root";
    public $host = "localhost";
    public $password = "";
    public $dbName = "invoices";
    
        
          try{

            $conn = new PDO("mysql:host=$host;dbname=".$dbName, $userName, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connection Successfully established";
        }
        catch(PDOException $e) {
            echo"Connection failure: " . $e->getMessage();
        }


        function insert(){
        $arr = array('SKU' => 'NX.HGDM3.001', 'product' => 'Acer Aspire 3 15.6 celeron');

        $sql = "INSERT INTO invoice ('clientID','item','amount','qty') VALUES ('Zweli1',json_encode($arr),10000, 2)";
    }
    
        function update(){
        $sql = "UPDATE invoices SET name = ? WHERE id = ?";
    }

        function delete(){
        $sql = "DELETE FROM invoices WHERE id = ?";


    }

         function get($id){
        
        $sql = "SELECT * FROM invoice WHERE invoiceID =?";

        $result = $conn->prepare($sql);
        $a = 1;
        $result->bindParam(1, $id);

        $result->execute();

        $row = $result->fetch(\PDO::FETCH_ASSOC);

        return $row;

    }

     function getById($id){
        $sql = "SELECT * FROM invoices WHERE id = ?";
    }
    
     function disconnectDB(){
        $conn = null;
    }
}


