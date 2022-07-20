<div class="mt-5 contenedor">
        <a href="/admin" class="servicio__enlace servicio__enlace--crear">Volver</a>
    </div>
    <main class="servicios">
        <h2>Registrar Funcionario</h2>
        
        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form action="/funcionarios/crear" class="mt-5 formulario contenedor" method="POST">
            <?php include __DIR__ . '/formulario.php'; ?>
            <input type="submit" value='Registrar Funcionario' class="boton">
        </form>
    </main>