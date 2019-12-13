<body class="home">
    <!-- Sing in  Form -->

    <h2 class="form-title">Iniciar Sesión</h2>
    <form action="<?php echo FRONT_ROOT ?>User/logIn" method="post" id="login-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="user" placeholder="Usuario" required="required" />
        </div>
        <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña" required="required" />
        </div>
        <div class="form-group form-button">
            <input type="submit" id="signin" class="form-submit" value="Ingresar" />
        </div>
    </form>
    <a href="<?php echo FRONT_ROOT ?>User/signUpForm" >Crear Cuenta</a>
    <h3>    <a href="<?php echo FRONT_ROOT?>Home/Index">HOME</a>
