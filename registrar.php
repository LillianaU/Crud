<?php
//print_r($_POST);
/*Estas líneas verifican si los campos necesarios (txtNombre, txtEdad y txtSigno) se han enviado en un formulario HTML a través del método POST. Si alguno de los campos está vacío, redirige al usuario a la página de inicio (index.php) con un mensaje de error en la URL. La función header() se utiliza para enviar una cabecera HTTP de redirección. La función exit() se utiliza para detener la ejecución del script actual. */
if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}
/*La función empty() es una función de PHP que se utiliza para verificar si una variable está vacía o no. La función devuelve true si la variable no tiene un valor establecido o si su valor es considerado "falso" según las reglas de PHP. La función devuelve false si la variable tiene un valor establecido y es considerado "verdadero" según las reglas de PHP.

En el contexto del código PHP que has compartido, la función empty() se utiliza para verificar si los campos necesarios (txtNombre, txtEdad y txtSigno) se han enviado en un formulario HTML a través del método POST.  */
include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$edad = $_POST["txtEdad"];
$signo = $_POST["txtSigno"];

$sentencia = $bd->prepare("INSERT INTO persona(nombre,edad,signo) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $edad, $signo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}