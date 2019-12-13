<body>
    <!-- Sign up form -->



    <h2>Registrarse</h2>
    <form action="<?php echo FRONT_ROOT ?>User/signUp" method="post" id="register-form">
        <div>
            <label for="name">Username</label>
            <input type="text" name="username" placeholder="Usuario" required pattern="[A-Za-z0-9]{1,15}" title="Solo letras o números (máximo 15 caracteres)" />
        </div>

        <div>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña" required pattern="[A-Za-z0-9]{4,}" title="Solo letras o números (mínimo 4 caracteres)" />
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" required />
        </div>

        <div>
            <label for="dni">DNI</label>
            <input type="number" name="dni"placeholder="DNI" required>
        </div>

        <div>
            <!-- <input type="submit" name="signup"  class="btn btn-primary" value="Registrarse" /> -->
            <button type="submit" name="signup" class="btn btn-primary">Registrarse</button>
            
        </div>
    </form>
    <a href="<?php echo FRONT_ROOT?>Home/Index">HOME</a>