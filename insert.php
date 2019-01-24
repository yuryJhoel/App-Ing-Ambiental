<?php
// header('Location: https://zionlenuz1.000webhostapp.com/mostrar.php');
header('Location: ./mostrar.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulario</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
<?php

 include('conexion.php');
$nombre = $_POST['nombre'];
$veloccont = $_POST['veloccont']; // velocidad del contaminante
$diamint = $_POST['diamint']; // diametro interior
$velocvient = $_POST['velocvient']; //velocidad del viento
$presatm = $_POST['presatm']; // presion atmosferica
$tempcont = $_POST['tempcont']; // temperatura del contaminante
$tempamb = $_POST['tempamb']; // temperatura ambiente
$tipoestb = strtoupper($_POST['tipoestb']); //factor de correccion

$emisgas = $_POST['emisgas']; // emision del gas
$disttrans = $_POST['disttrans']; // distancia al eje y (transversal)
$distz = $_POST['distz'];    // distancia al eje z
$distlugar = $_POST['distlugar']; // distancia del lugar contaminado
$altchim = $_POST['altchim']; //altura de la chimenea
$req_kind_concentracion = $_POST['tipoconcentracion'];

// Determinando tipo de estabilidad
require("datos-generales.php");
if($distlugar > 1){
    switch ($tipoestb) {
        case 'A':
            $arreglo_consts= $mayora1km_estba;
            break;
        case 'B':
            $arreglo_consts= $mayora1km_estbb;
            break;
        case 'C':
            $arreglo_consts= $mayora1km_estbc;
            break;
        case 'D':
            $arreglo_consts= $mayora1km_estbd;
            break;
        case 'E':
            $arreglo_consts= $mayora1km_estbe;
            break;
        
        default:
            $arreglo_consts= $mayora1km_estbf;
            break;
    }

}else{
    switch ($tipoestb) {
        case 'A':
            $arreglo_consts= $menora1km_estba;
            break;
        case 'B':
            $arreglo_consts= $menora1km_estbb;
            break;
        case 'C':
            $arreglo_consts= $menora1km_estbc;
            break;
        case 'D':
            $arreglo_consts= $menora1km_estbd;
            break;
        case 'E':
            $arreglo_consts= $menora1km_estbe;
            break;
        
        default:
            $arreglo_consts= $menora1km_estbf;
            break;
    }

}
$a = $arreglo_consts[0];
$c =$arreglo_consts[1];
$d =$arreglo_consts[2];
$f =$arreglo_consts[3];

require("elvac-penacho.php");
$elevacion = elevacion($veloccont, $diamint, $velocvient, $presatm, $tempcont, $tempamb, $tipoestb);
$sigmay = desvihoriz($a, $distlugar);
$sigmaz = desvivert($c,$distlugar,$d,$f);

if($req_kind_concentracion == "sinreflexion"){
    $concentracion =  concentracion($emisgas,$distz, $disttrans, $altchim, $velocvient, $sigmay,$sigmaz,$elevacion);
}elseif($req_kind_concentracion == "conreflexion"){
    $concentracion =  concent_con_reflexion($emisgas,$distz, $disttrans, $altchim, $velocvient, $sigmay,$sigmaz,$elevacion);
}elseif($req_kind_concentracion == "masafectadosz0"){
    $concentracion =  mas_afectadosz0($emisgas, $disttrans, $altchim, $velocvient, $sigmay, $sigmaz, $elevacion);
}else {
    $concentracion =  mas_afectadosz0y0($emisgas, $altchim, $velocvient, $sigmay, $sigmaz, $elevacion);
}
/*
     Insercion a la base de datos 
*/
$consulta = "INSERT INTO sustancias(nombre, elevacion, concentracion, horizontal, vertical ,tipo_de_contam) VALUES ('$nombre','$elevacion', '$concentracion','$sigmay', '$sigmaz', '$req_kind_concentracion')" or die (mysqli_error($mysqli));

mysqli_query($mysqli, $consulta);
die();
?>

