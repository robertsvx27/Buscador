<?php
    require('php/data.php');
$ciudad = isset($_POST['sCiudad']) ? $_POST['sCiudad'] : '';
$tipo = isset($_POST['sTipo']) ? $_POST['sTipo'] : '';
$desde = isset($_POST['sDesde']) ? $_POST['sDesde'] : '0';
$hasta = isset($_POST['sHasta']) ? $_POST['sHasta'] : '100000';
//$rango = isset($_POST['rangoPrecio']) ? $_POST['rangoPrecio'] : null;

//echo $ciudad + '    ' + $tipo + '     ' ;
//echo $tipo;
//echo $ciudad;
//echo $desde;
//echo $hasta;

 $items = getData('data-1.json');

 $filtro = [];

$cont =0;

for($i = 0; $i < count($items); $i++){
    $item = $items[$i];
    $ci = $item['Ciudad'];
    $ti = $item['Tipo'];
    $precio = $item['Precio'];

    if ($ciudad !=='' and $tipo !==''){
        if($ciudad===$ci and $tipo===$ti and $precio>= $desde and $precio<= $hasta){
            $filtro[$cont] = array(
                "Id" => $item["Id"],
                "Direccion" => $item["Direccion"],
                "Ciudad" => $item["Ciudad"],
                "Telefono" => $item["Telefono"],
                "Codigo_Postal" => $item["Codigo_Postal"],
                "Tipo" => $item["Tipo"],
                "Precio" => $item["Precio"]
             );
             $cont +=1;
        }        
    }elseif ($ciudad !==''){
        if($ciudad===$ci and $precio>= $desde and $precio<= $hasta){
            $filtro[$cont] = array(
                "Id" => $item["Id"],
                "Direccion" => $item["Direccion"],
                "Ciudad" => $item["Ciudad"],
                "Telefono" => $item["Telefono"],
                "Codigo_Postal" => $item["Codigo_Postal"],
                "Tipo" => $item["Tipo"],
                "Precio" => $item["Precio"]
             );
             $cont +=1;
        }
    }elseif ($tipo !== ''){
        if($tipo===$ti and $precio>= $desde and $precio<= $hasta){
            $filtro[$cont] = array(
                "Id" => $item["Id"],
                "Direccion" => $item["Direccion"],
                "Ciudad" => $item["Ciudad"],
                "Telefono" => $item["Telefono"],
                "Codigo_Postal" => $item["Codigo_Postal"],
                "Tipo" => $item["Tipo"],
                "Precio" => $item["Precio"]
             );
             $cont +=1;
        }
    }else{
        if($precio>= $desde and $precio<= $hasta){
            $filtro[$cont] = array(
                "Id" => $item["Id"],
                "Direccion" => $item["Direccion"],
                "Ciudad" => $item["Ciudad"],
                "Telefono" => $item["Telefono"],
                "Codigo_Postal" => $item["Codigo_Postal"],
                "Tipo" => $item["Tipo"],
                "Precio" => $item["Precio"]
             );
             $cont +=1;
        }
    }
 }
 echo json_encode($filtro,JSON_FORCE_OBJECT);
?>