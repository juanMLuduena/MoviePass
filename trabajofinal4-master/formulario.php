<?php
 include "header.html";
 ?>

<html>

<!-- FORMULARIO -->
<body>
<div id="contact" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h4>Sign up</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="map">
                    <img src="img/signupimage.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <form id="contact" action="" method="post">
                        <div class="col-md-6">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Nombre" required>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="surname" type="text" class="form-control" id="surname"
                                    placeholder="Apellido" required>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="email" type="email" class="form-control" id="email"
                                    placeholder="Email" required>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="birthdate" type="date" class="form-control" id="birthdate"
                                    placeholder="Fecha de Nacimiento" required> <!-- Ver como arreglar el placeholder-->
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="nickname" type="text" class="form-control" id="nickname"
                                    placeholder="Usuario" required>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="password" type="password" class="form-control" id="password"
                                    placeholder="Contraseña" required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="btn">Registrarse</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<?php
 include "footer.html";
 ?>
</html>