<main class="servicios">
    <div class="grid-admin">
        <div>

            <h2 class="m-5">Administrador Sitio Web OMIL</h2>

            <?php
            if($resultado) {
                $mensaje = mostrarNotificacion(intval($resultado));

                if($mensaje) { ?> 
                <p class="alerta exito"><?php echo s($mensaje) ?></p>    
            <?php }
            }
            ?>
            <a href="/vacantes/crear" class="servicio__enlace servicio__enlace--admin">Crear Vacante Laboral</a>
            <?php if($_SESSION['rol'] === 'Administrador') : ?>
                <a href="/funcionarios/crear" class="servicio__enlace servicio__enlace--admin">Registrar Funcionario</a>
            <?php endif; ?>
        </div>

        
        <div>
            <h2 class="centrado m-5">Filtro de búsqueda</h2>

            <form class="formulario contenedor" method="POST" action="/admin">
                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="cargo" placeholder="Ingrese el Cargo a buscar">

                <label for="categoriaId">Seleccione una Categoría</label>
                <select name="categoriaId" id="categoriaId">
                    <option value="" selected>-- Seleccione Categoría--</option>
                        <?php foreach($categorias as $categoria): ?>
                            <option value="<?php echo $categoria->id;?>">
                                <?php echo s($categoria->categoria); ?>
                            </option>
                        <?php endforeach; ?>
                </select>
                
                <label for="inclusivoId">Seleccione si es inclusivo</label>
                <select name="inclusivoId" id="inclusivoId">
                    <option value="" selected>-- Seleccione --</option>
                        <?php foreach($inclusivos as $inclusivo): ?>
                            <option value="<?php echo s($inclusivo->id); ?>">
                                <?php echo s($inclusivo->estado); ?>
                            </option>
                        <?php endforeach; ?>
                </select>
                
                <label for="creado">Fecha de creación</label>
                <input type="date" name="creado" id="creado">

                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>

        <p class="alerta error"><?php echo $mensaje ?></p>

        <div>
            <h2 class="mt-5 m-5">Vacantes Laborales</h2>
        </div>

        <table class="vacantes-crud contenedor">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cargo</th>
                    <th>Requerimiento</th>
                    <th>Fecha de Expiración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los resultados-->
            <?php foreach($vacantes as $vacanteLaboral): ?>
                <tr>
                    <td> <?php echo $vacanteLaboral->id ?> </td>
                    <td> <?php echo $vacanteLaboral->cargo ?> </td>
                    <td> <?php echo $vacanteLaboral->requerimiento?> </td>
                    <td> <?php echo $vacanteLaboral->expira ?></td>
                    <td class="dflex">
                        <a href="/vacantes/actualizar?id=<?php echo $vacanteLaboral->id?>" class="btn-actualizar dblock">Actualizar</a>
                        <form method="POST" action="/vacantes/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vacanteLaboral->id;?>">
                            <input type="hidden" name="tipo" value="vacante">
                            <input type="submit" class="btn-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <?php if($_SESSION['rol'] === 'Administrador') : ?>
        <h2 class="mt-5">Funcionarios</h2>
        <table class="vacantes-crud contenedor">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los resultados-->
            <?php foreach($funcionarios as $funcionario): ?>
                <tr>
                    <td> <?php echo $funcionario->nombre . " " . $funcionario->apellido ?> </td>
                    <td> <?php echo $funcionario->correo ?> </td>

                    <td class="dflex">
                        <a href="/funcionarios/actualizar?id=<?php echo $funcionario->id?>" class="btn-actualizar dblock">Actualizar</a>
                        <form method="POST" action="funcionarios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $funcionario->id;?>">
                            <input type="hidden" name="tipo" value="funcionario">
                            <input type="submit" class="btn-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
</main>