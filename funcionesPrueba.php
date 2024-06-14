<?php


function agregar($articulos, $nombre, $cantidad, $valor, $modelo) {
    
    $articulo = [
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];
    $articulos[] = $articulo;
    echo "agregado con exito";
    return $articulos;
}

function buscar($articulos, $modelo) {
    foreach ($articulos as $articulo) {
        if ($articulo['modelo'] == $modelo) {
            return "Nombre: " . $articulo['nombre'] . "<br>";
        }
    }
    return "articulo no encontrado.<br>";
}

function mostrar($articulos) {
    $result = '';
    foreach ($articulos as $articulo) {
        $artNombre = $articulo['nombre'];
        $artValor = $articulo['valor'];
        $artModelo = $articulo['modelo'];
        $artCantidad = $articulo['cantidad'];
        $result .= "Nombre: " . $artNombre . ", Valor: " . $artValor . ", Modelo: " . $artModelo . ", Cantidad " . $artCantidad .  "<br>";
        
   
    }
    return $result;
}

function actualizar(&$articulos, $modelo, $nombre, $valor) {
    foreach ($articulos as &$articulo) {
        if (isset($articulo['modelo']) && $articulo['modelo'] == $modelo) {
            $articulo['nombre'] = $nombre;
            $articulo['valor'] = $valor;
            break;
        }
    }
    return $articulos;
}

function valorTotal($articulos) {
    $total = 0;
    foreach($articulos as $articulo) {
        $total += intval($articulo['valor']);
    }

    return $total;

}

function filtrarValor($articulos, $valor) {
 
    $result = '';

    foreach ($articulos as $articulo) {
        
        if($valor < $articulo['valor']){
            $artNombre = $articulo['nombre'];
            $artValor = $articulo['valor'];
            $artModelo = $articulo['modelo'];
            $artCantidad = $articulo['cantidad'];
            $result .= "Nombre: " . $artNombre . ", Valor: " . $artValor . ", Modelo: " . $artModelo . ", Cantidad " . $artCantidad .  "<br>";
        }

    }
    
}

function listarModelos($articulos) {

    $result = '';
    
    foreach ($articulos as $articulo) {
        $artModelo = $articulo['modelo'];
        $result .= "Modelos Registrados: " . $artModelo .  "<br>";
        
   
    }

    return $result;

}

function calcularPromedio($articulos) {
    
    $total = 0;
    foreach($articulos as $articulo) {
        $total += intval($articulo['valor']);
    }

    $largo = count($articulos);

    return "El promedio es: $" . ($total / $largo);

}

$articulos = [
    [
    'nombre' => 'laptop',
    'cantidad' => 1,
    'valor' => 122,
    'modelo' => 'lg'
    ]
];

$nombre = "articulo 1";
$cantidad = 1;
$valor = 100;
$modelo = "Modelo 1";

$articulos = agregar($articulos, $nombre, $cantidad, $valor, $modelo);
$resultado = "Articulo agregado correctamente.<br>";

echo $resultado;

$resultado = buscar($articulos, $modelo);

echo $resultado;

$resultado = mostrar($articulos);

echo $resultado;

$articulos = actualizar($articulos, $modelo, $nombre, $valor);
$resultado = "Articulo actualizado correctamente.<br>";

echo $resultado;

$resultado = valorTotal($articulos);

echo $resultado;

$resultado = filtrarValor($articulos, $valor);

echo $resultado;

$resultado = listarModelos($articulos);

echo $resultado;

$resultado = calcularPromedio($articulos);

echo $resultado;

