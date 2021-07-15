<?php 
    require_once('conexion.php');

    function verifyExistsDocument($documento, $tipo){
        $sql = conexion();

        $myparams['doc'] = $documento;
        $myparams['tdoc'] = $tipo;
        
        $procedure_params = array(
            array(&$myparams['doc']),
            array(&$myparams['tdoc']),
           
        );
            
        
        $proc = "EXECUTE PA_VALIDAR_DOCUMENTO @doc = ? , @tdoc = ?";
        $stmt=sqlsrv_prepare($sql,$proc,$procedure_params);
        $result= sqlsrv_execute($stmt);
        if ($result) {
            $rows = sqlsrv_has_rows( $stmt );
            
            return $rows;
        }else{
            return $result;
        }
    }

    function verificarCronograma($documento,$tipo){
        $sql = conexion();

        $myparams['doc'] = $documento;
        $myparams['tdoc'] = $tipo;
        
        $procedure_params = array(
            array(&$myparams['doc']),
            array(&$myparams['tdoc']),
           
        );
            
        
        $proc = "EXECUTE PA_VALIDAR_DOCUMENTO_CRONOGRAMA @doc = ? , @tdoc = ?";
        $stmt=sqlsrv_prepare($sql,$proc,$procedure_params);
        $result= sqlsrv_execute($stmt);
        if ($result) {
            $rows = sqlsrv_has_rows( $stmt );
            
            return $rows;
        }else{
            return $result;
        }
    }
?>