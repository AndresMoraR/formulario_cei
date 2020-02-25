<?php require 'header.view.php'; ?>
<body class="text-center">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../fus_vertical_blanco.png" style="max-width: 100%; width: 300px;">
        </div>
        <div class="row text-white">
            <div class="col-sm-4 offset-sm-4 text-center">
                <div class="info-form">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="justify-content-center">
                        <div class="form-group">
                            <label for="inp_user" class="sr-only">Usuario</label>
                            <input type="text" id="inp_user" name="inp_user" class="form-control" placeholder="Usuario" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="inp_pass" class="sr-only">Contraseña</label>
                            <input type="password" id="inp_pass" name="inp_pass" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">INGRESAR</button>
                        <?php if(!empty($errores)): ?>
                            <!-- <div class="error">                                
                                <?php echo $errores; ?>                                
                            </div> -->
                            <div class="alert" role="alert">
                                <?php echo $errores; ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>
<?php require 'footer.view.php'; ?>