<?php include 'template/header.php'  /*Esta línea incluye el archivo header.php en el documento PHP actual. El archivo
header.php contiene código HTML y PHP que se utiliza en todo el sitio web, como la sección de encabezado.*/

/*
Estas líneas verifican si se ha pasado un parámetro codigo en la URL. Si no se proporciona, redirige al usuario a la
página de inicio (index.php) con un mensaje de error en la URL. La función header() se utiliza para enviar una cabecera
HTTP de redirección. La función exit() se utiliza para detener la ejecución del script actual.*/
?>
<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from persona where codigo = ?;");
$sentencia->execute([$codigo]);
/*Esta línea recupera una única fila de la base de datos y la asigna a la variable $persona. La función fetch() se utiliza para recuperar la siguiente fila de un conjunto de resultados y devuelve un objeto que representa la fila.*/

$persona = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required
                            value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                            value="<?php echo $persona->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required
                            value="<?php echo $persona->signo; ?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>