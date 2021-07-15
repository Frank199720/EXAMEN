<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/primeraAplicacion/back/dataAccess/dalCronograma.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/primeraAplicacion/back/dataAccess/dalDocumento.php');

    function cronogramaPorDocumento($documento, $nroCuotas, $tipo){
        $variable=verifyExistsDocument($documento,$tipo);
        
        if($variable){
            $variableCronograma=verificarCronograma($documento,$tipo);
            if(!$variableCronograma){
                return obtenerCronogramaPagos($documento, $nroCuotas, $tipo);
            }else{
                return "01";
            }
            
        }else{
            return "00";
        }

        
    }





?>