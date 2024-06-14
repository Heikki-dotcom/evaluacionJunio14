<?php

function agregar($nombre, $cantidad, $valor, $articulo, $modelo) {
    $articulo[] = [
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];
    return $articulo;
}

function buscar($articulos, $modelo) {
    $result = '';
    foreach ($articulos as $articulo) {
        $result .= "Nombre: " . $articulo['nombre'] . ", Valor: " . $articulo['valor'] . ", Modelo: " . $articulo['modelo'] . "<br>";
        
   
    }
    return $result;
}

function mostrar($articulos) {
    
}

function actualizar($articulos,$email,$nombre,$valor,$modelo) {
    
}

function valorTotal() {
    
}

function filtrarValor() {
    
}

function listarModelos() {
    
}

function calcularPromedio() {
    
}

if (!isset($_SESSION['articulos'])) {
    $_SESSION['articulos'] = [];
}

$articulos = $_SESSION['articulos'];
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    $nombre = $_POST['nombre'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';

    switch ($accion) {
        case 'agregar':
            $articulos = agregar($articulos, $nombre, $valor, $modelo,$cantidad);
            $resultado = "Usuario agregado correctamente.<br>";
            break;
        
        case 'buscar':
            $resultado = buscar($articulos, $modelo);
            break;
        
        case 'mostrar':
            $resultado = mostrar($articulos);
            break;
        
        case 'actualizar':
            $articulos = actualizar($articulos, $email, $nombre, $valor, $modelo);
            $resultado = "Usuario actualizado correctamente.<br>";
            break;

        case 'limpiar':
            $_SESSION['articulos'] = [];
            $resultado = "Resultados limpiados correctamente.<br>";
            session_destroy();
            break;

        default:
            $resultado = "Acción no válida.";
    }

    $_SESSION['articulos'] = $articulos;
    $_SESSION['resultado'] = $resultado;
}