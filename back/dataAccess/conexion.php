<?php 

    function conexion(){

        try{
            $serverName = "DESKTOP-7OK4IHV\sqlexpress";
    
            $connectionInfo = array( "Database" => "TenebrosaOLTP");
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            
            return $conn;
        }catch(Exception $e){
            return $e->getMessage();
        }
        

    }
    
    



?>