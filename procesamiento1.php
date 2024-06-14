<?php

session_start();

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

    return "El valor total es: $". $total;

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

    return $result;
    
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
    $cantidad = $_POST['cantidad'] ?? '';
    $modelo = $_POST['modelo'] ?? '';

    switch ($accion) {
        case 'agregar':
            $articulos = agregar($articulos, $nombre, $cantidad, $valor, $modelo);
            $resultado = "Articulo agregado correctamente.<br>";
            break;
        
        case 'buscar':
            $resultado = buscar($articulos, $modelo);
            break;
        
        case 'mostrar':
            $resultado = mostrar($articulos);
            break;
        
        case 'actualizar':
            $articulos = actualizar($articulos, $modelo, $nombre, $valor);
            $resultado = "Articulo actualizado correctamente.<br>";
            break;

        case 'calcularTotal':
            $resultado = valorTotal($articulos);
            break;

        case 'filtrarValor':
            $resultado = filtrarValor($articulos,$valor);
            break;

        case 'listarModelos':
            $resultado = listarModelos();
            break;

        case 'calcularPromedio':
            $resultado = calcularPromedio($resultados);
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
