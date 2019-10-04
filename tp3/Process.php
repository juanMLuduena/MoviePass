<?php 
if($_POST){
    $nombre=$_POST["nombre"];
    $edad=$_POST["edad"];
    $sexo=$_POST["sexo"];
}
else{
    header("Location: index.php");
}

function tablearPersona($nombre,$edad,$sexo){
    ?>
    <table>
    <caption>Tabla?</caption>
    <thead>
    <tr>
    <th>name</th> <th>age</th> <th>sex</th>
    </tr>
    </thead>
    <tbody>
    <tr> 
    <td>
    <?php
    echo $nombre;
    ?>
    </td>
    
    <td>
    <?php
    echo $edad;
    ?>
    </td>
    
    <td>
    <?php
    echo $sexo;
    ?>
    </td>
    </tr>
     <?php
     
     ?>
    </tbody>
    </table>
    <?php
    }
    tablearPersona($nombre,$edad,$sexo);
?>
