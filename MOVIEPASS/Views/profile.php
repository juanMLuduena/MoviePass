<body class="home">

<?php

use Controllers\UserController as UserController;

$userControl = new UserController();

if($userControl->checkSession()!=false)
{
    if($_SESSION["loggedUser"]->getPermissions()==1)
    {
        include_once(VIEWS_PATH . "header.php");
        include_once(VIEWS_PATH . "navAdmin.php");
    }
    else
    {
        if($_SESSION["loggedUser"]->getPermissions()==2)
        {
            include_once(VIEWS_PATH . "header.php");
            include_once(VIEWS_PATH . "navClient.php");
        }
    }
  ?>
    <html>
        <br><h5>DATOS PERSONALES</h5>
    <table class="table table-striped">
        <tbody>
                <tr>
                    <th scope="row">Nombre</th>
                    <td><?php echo $_SESSION["loggedUser"]->getFirstname(); ?></td>
                </tr>
                <tr>
                    <th scope="row">Apellido</th>
                    <td><?php echo $_SESSION["loggedUser"]->getLastname(); ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $_SESSION["loggedUser"]->getEmail(); ?></td>
                </tr>
                <tr>
                    <th scope="row">Usuario</th>
                    <td><?php echo $_SESSION["loggedUser"]->getUserName(); ?></td>
                </tr>
                <tr>
                    <th scope="row">Contraseña</th>
                    <td><?php echo $_SESSION["loggedUser"]->getPassword(); ?></td>
                </tr>
                <!-- <tr>
                    <th scope="row">DNI</th>
                    <td><?php //echo $_SESSION["loggedUser"]->getDni(); ?></td>
                </tr> -->
        </tbody>
    </table>

    <br>
    <br>
                    <div class="modifyUserBTN" align="right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModify<?php echo $_SESSION["loggedUser"]->getUserName(); ?>">Modificar datos</button>                    
                    </div>

    <?php include_once(VIEWS_PATH . "footer.php"); ?>



    <!-- MODAL -->
    <div class="modal fade" id="userModify<?php echo $_SESSION["loggedUser"]->getUserName(); ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title"><?php echo "Modificar datos "; ?></h4>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container fluid">
                        <div class="row">

                            <form action="<?php echo FRONT_ROOT ?>User/modifyUser" method="post">
                                <div class="form-group">
                                    <label for="firstname">
                                        <h5>Nombre</h5>
                                    </label>
                                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Nombre" value="<?php echo $_SESSION["loggedUser"]->getFirstname(); ?>" required >
                                </div>
                                <div class="form-group">
                                    <label for="lastname">
                                        <h5>Apellido</h5>
                                    </label>
                                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Apellido" value="<?php echo $_SESSION["loggedUser"]->getLastname(); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        <h5>Email</h5>
                                    </label>
                                    <input id="email" name="email" placeholder="Email" type="email" required value="<?php echo $_SESSION["loggedUser"]->getEmail(); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="username">
                                        <h5>Usuario</h5>
                                    </label>
                                    <input id="username" name="username" placeholder="Usuario" type="text" value="<?php echo $_SESSION["loggedUser"]->getUserName(); ?>" class="form-control" required pattern="[A-Za-z0-9]{1,15}" title="Solo letras o números (máximo 15 caracteres)">
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        <h5>Contraseña</h5>
                                    </label>
                                    <input id="password" name="password" placeholder="Contraseña" type="text" value="<?php echo $_SESSION["loggedUser"]->getPassword(); ?>" class="form-control" required pattern="[A-Za-z0-9]{4,}" title="Solo letras o números (mínimo 4 caracteres)">
                                </div>
                                <div class="form-group">
                                    <button name="submit" type="submit" class="btn btn-primary btn-success btn-block">Modificar</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    

  <?php
}
else
{
    include_once(VIEWS_PATH . "index.php");
}


?>



