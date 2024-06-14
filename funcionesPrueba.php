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
        $total .= intval($articulo['valor']);
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

function listarModelos() {
    
}

function calcularPromedio() {
    
}

$articulos = [
    [
    'nombre' => 'laptop',
    'cantidad' => 1,
    'valor' => 122,
    'modelo' => 'lg'
    ]
];

$articulos =  agregar('tele',1,400,$articulos,2);
echo buscar($articulos,2);
echo mostrar($articulos);
echo filtrarValor($articulos, 300);