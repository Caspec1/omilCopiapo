<main class="contacto contenedor">
        <h2 class="contacto__heading">Contáctanos</h2>
        <form method="POST" class="formulario" action="/contacto">
            <fieldset>
            <legend>Tus datos</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="contacto[nombre]" placeholder="Tu Nombre" required>

                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="contacto[email]" placeholder="Tu Email" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="contacto[telefono]" placeholder="9-99999999">

                <label for="mensaje">Su consulta:</label>
                <textarea id="mensaje" placeholder="Tu consulta" name="contacto[mensaje]" required></textarea>

            </fieldset>
            <input type="submit" value=Enviar required>
        </form>
    </main>