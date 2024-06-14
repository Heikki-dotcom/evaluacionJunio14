

<?php
session_start();
$resultado = '';

if (isset($_SESSION['resultado'])) {
    $resultado = $_SESSION['resultado'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <form action="funcionesPrueba.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        
        <label for="valor">valor:</label>
        <input type="number" id="valor" name="valor"><br>

        <label for="cantidad">cantidad:</label>
        <input type="number" id="cantidad" name="cantidad"><br>
        
        <label for="modelo">modelo:</label>
        <input type="text" id="modelo" name="modelo"><br>
        
        <input type="radio" id="agregar" name="accion" value="agregar">
        <label for="agregar">Agregar</label><br>
        
        <input type="radio" id="buscar" name="accion" value="buscar">
        <label for="buscar">Buscar</label><br>
        
        <input type="radio" id="mostrar" name="accion" value="mostrar">
        <label for="mostrar">Mostrar</label><br>
        
        <input type="radio" id="actualizar" name="accion" value="actualizar">
        <label for="actualizar">Actualizar</label><br>

        <input type="radio" id="calcularTotal" name="accion" value="calcularTotal">
        <label for="calcularTotal">Calcular Valor Total</label><br>

        <input type="radio" id="filtrarValor" name="accion" value="filtrarValor">
        <label for="filtrarValor">Filtrar Por Valor</label><br>

        <input type="radio" id="listarModelos" name="accion" value="listarModelos">
        <label for="listarModelos">Listar Modelos</label><br>

        <input type="radio" id="calcularPromedio" name="accion" value="calcularPromedio">
        <label for="calcularPromedio">Calcular Valor Promedio</label><br>
        
        <input type="submit" value="Enviar">
    </form>

    <form action="funcionesPrueba.php" method="POST">
        <input type="hidden" name="accion" value="limpiar">
        <input type="submit" value="Limpiar Resultados">
    </form>

    <div id="resultados">
    <?php echo $resultado; 
   
    ?>
    
    </div>

    
</body>
</html>



