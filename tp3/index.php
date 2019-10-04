<?php
include('header.php');
?>

<a href="Ejercicios.php">Ejercicios</a>

<form action="Process.php"method="POST">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="number"name="edad"placeholder="Edad">
    <input type="radio"name="sexo"value="M">Masculino
    <input type="radio"name="sexo"value="F">Femenino
    <button type="submit"> ENVIAR </button>
</form>

<?php
include('footer.php');
?>