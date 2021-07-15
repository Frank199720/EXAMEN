<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/primeraAplicacion/back/businessLogic/gestorCronograma.php');

    $documento = $_POST['documento'];
    $nroCuotas = $_POST['nroCuotas'];
    $tipo = $_POST['tipo'];
    
    try{
        
        $cuotas = cronogramaPorDocumento($documento, $nroCuotas, $tipo);
        $resultado = json_encode($cuotas);
        echo $resultado;
       
    }catch(Exception $e){
        $respuesta = $e->getMessage();
        $resultado = json_encode($respuesta);
        echo $resultado;
        
        
    }




?>