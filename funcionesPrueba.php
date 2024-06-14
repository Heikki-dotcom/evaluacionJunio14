<?php

session_start();

function agregar($nombre, $cantidad, $valor, $articulos, $modelo) {
    $articulos = [
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'valor' => $valor,
        'modelo' => $modelo
    ];
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

function actualizar($articulos,$modelo,$nombre,$valor) {
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

header("Location: form.php");
exit();