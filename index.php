<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
            /*Esta línea verifica si se ha proporcionado un parámetro de URL llamado mensaje y si su valor es igual a falta. isset() es una función de PHP que devuelve true si la variable o el índice del arreglo existe y no es nulo. En este caso, isset() se utiliza para verificar si el parámetro de URL mensaje existe. and es un operador lógico que se utiliza para combinar dos expresiones lógicas y devuelve true si ambas expresiones son verdaderas. En este caso, and se utiliza para combinar la verificación de isset($_GET['mensaje']) con la verificación de si $_GET['mensaje'] es igual a 'falta'. */
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>


            <?php
            /*if (isset()) es una estructura condicional en PHP que se utiliza para verificar si una variable o un índice de arreglo existe y no es nulo. La función isset() devuelve true si la variable o el índice del arreglo existe y no es nulo. De lo contrario, devuelve false.

La sintaxis básica de la estructura if (isset()) es la siguie */
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado!</strong> Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>



            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado!</strong> Los datos fueron actualizados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Los datos fueron borrados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($persona as $dato) {
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->signo; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i
                                            class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                        href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i
                                            class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>