<main class="vacantes m-3 mt-5 contenedor">
        <h2 class="vacantes__heading m-3">Vacantes Laborales</h2><br>

        <h3 class="vacantes__heading m-3">Filtro de Búqueda</h3>
        <form class="formulario formulario--vacantes-grid contenedor" method="POST" action="/vacantes">
            <div>
                <label for="categoriaId">Seleccione una Categoría</label>
                <select name="categoriaId" id="categoriaId">
                    <option value="" selected>-- Seleccione Categoría--</option>
                        <?php foreach($categorias as $categoria): ?>
                            <option value="<?php echo $categoria->id;?>">
                                <?php echo s($categoria->categoria); ?>
                            </option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="inclusivoId">Seleccione si es inclusivo</label>
                <select name="inclusivoId" id="inclusivoId">
                    <option value="" selected>-- Seleccione --</option>
                        <?php foreach($inclusivos as $inclusivo): ?>
                            <option value="<?php echo s($inclusivo->id); ?>">
                                <?php echo s($inclusivo->estado); ?>
                            </option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Buscar">
            </div>
        </form>
    <?php
        include 'ofertas.php';
    ?>
        
    </main>