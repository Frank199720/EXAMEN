<?php 
    require_once('conexion.php');
    function obtenerCronogramaPagos($documento, $nroCuotas, $tipo){
     
        $sql = conexion();

        $myparams['doc'] = $documento;
        $myparams['tdoc'] = $tipo;
        $myparams['NroCuotas'] = $nroCuotas;
        $procedure_params = array(
            array(&$myparams['doc']),
            array(&$myparams['tdoc']),
            array(&$myparams['NroCuotas']),
        );
            
        
        $proc = "EXECUTE Cre_GeneracionCronograma @doc = ? , @tdoc = ?, @NroCuotas = ?";
        $stmt=sqlsrv_prepare($sql,$proc,$procedure_params);
        $result= sqlsrv_execute($stmt);
        if($result){
            $resultado= array();
            
            while( $obj = sqlsrv_fetch_array( $stmt)) {
                // Iterate through the fields of each row.
               
                array_push($resultado,$obj);
                
             }
             return $resultado;
            //echo $row;
            
        }else{
            return "02";
        }
        
    }
    



?>