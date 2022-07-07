<?php
    

        $userName = "root";
        $host = "localhost";
        $password = "";
        $dbName = "invoices";


        try {
            $conn = new PDO("mysql:host=$host;dbname=".$dbName, $userName, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connection Successfully established";
            
        } catch (PDOException $err) {
            echo"Connection failure: " . $err->getMessage();
        }


        $sql = "SELECT * FROM invoice WHERE invoiceID =?";

        $result = $conn->prepare($sql);
        $a = 1;
        $result->bindParam(1, $a);

        $result->execute();

        $row = $result->fetch(\PDO::FETCH_ASSOC);

        echo $row['clientID'];