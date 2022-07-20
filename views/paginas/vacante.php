<main class="vacantes m-5 mt-5 contenedor">

        <h2 class="vacantes__heading"> <?php echo $vacantes->cargo ?> </h2>
        <h3 class="vacantes__heading--req mt-5">Requerimientos:</h3>
        <p><?php echo $vacantes->requerimiento ?></p>

        <div class="vacante-info mt-5">
            <p class="vacante-info__texto"><span>Cupos Disponibles: </span><?php echo $vacantes->cupos ?></p>
            <p class="vacante-info__texto"><span>Remuneración: </span>$ <?php echo $vacantes->sueldo ?></p>
            <p class="vacante-info__texto"><span>Experiencia: </span><?php echo $vacantes->experiencia ?></p>
            <p class="vacante-info__texto"><span>Turnos de trabajo: </span><?php echo $vacantes->turno ?></p>
            <p class="vacante-info__texto"><span>Horario de trabajo: </span><?php echo $vacantes->horario ?></p>
            <p class="vacante-info__texto"><span>Ciudad: </span><?php echo $vacantes->ciudad ?></p>
        </div>

        <h3 class="postulacion mt-5">Para postular complete el siguiente formulario</h3>
    
        <form class="formulario formulario-postulacion mt-5 m-5" method="POST" enctype="multipart/form">
            <fieldset>
                <legend>Ingrese su información</legend>
                            <label for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="postular[nombre]" placeholder="Su nombre" required>

                            <label for="telefono">Teléfono: </label>
                            <input type="tel" id="telefono" name="postular[telefono]" placeholder="Su teléfono" required>

                            <label for="email">Correo: </label>
                            <input type="email" id="email" name="postular[email]" placeholder="Su correo" required>

                            <label for="cv">Adjunte su cv: </label>
                            <input type="file" id="cv" name="postular[cv]" accept="application/msword, application/pdf" required>

                            <label for="certificacion">Adjunte otros documentos: </label>
                            <input type="file" id="certificacion" name="postular[certificacion]" accept="image/jpg,  image/jpeg, application/msword, application/pdf">
                            <input type="submit" value="Postular">

                </div>

            </fieldset>
        </form>
    </main>