<?php

function agregar($nombre, $cantidad, $valor, $articulos, $modelo) {
    $articulos[] = [
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];
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
        $result .= "Nombre: " . $artNombre . ", Valor: " . $artValor . ", Modelo: " . $artModelo . "<br>";
        
   
    }
    return $result;
}

function actualizar($articulos,$modelo, $nombre, $valor) {
    foreach ($articulos as $articulo) {
        if ($articulo['modelo'] == $modelo) {
            $articulo['nombre'] = $nombre;
            $articulo['valor'] = $valor;
            break;
        }
    }
    return $articulos;
}

function valorTotal() {
    
}

function filtrarValor() {
    
}

function listarModelos() {
    
}

function calcularPromedio() {
    
}

$articulos = [
    [
    'nombre' => 'tele',
    'cantidad' => 1,
    'valor' => 122,
    'modelo' => 'lg'
    ]
];

$articulos =  agregar('tele',1,100,$articulos,2);
echo buscar($articulos,2);
echo mostrar($articulos);