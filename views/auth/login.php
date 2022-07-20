<main class="contenedor">
        <div class="centrado m5 mt-5">
            <h2 class="iniciar-sesion">Iniciar Sesión</h2>
        </div>
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario mt-5 m-5" method="POST">
        <fieldset>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" name="email" id="email" required>

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu Password" name="password" id="password" required>

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton">
        </form>
    </main>