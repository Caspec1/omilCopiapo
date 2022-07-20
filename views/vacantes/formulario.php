<fieldset>
                <legend>Información de la vacante</legend>
                
                <div class="formulario__grid">
                    <div>
                        <label for="cargo">Cargo:</label>
                        <input type="text" id="cargo" name="vacante[cargo]" placeholder="Cargo" value="<?php echo s($vacante->cargo) ?>">
                    </div>
                    <div>
                        <label for="cupos">Cupos:</label>
                        <input type="number" id="cupos" name ="vacante[cupos]" placeholder="Cupos" min="1" value="<?php echo s($vacante->cupos) ?>">
                    </div>
                    <div>
                        <label for="categoriaId">Categoría:</label>
                        <select name="vacante[categoriaId]" id="categoriaId">
                        <option value="">-- Seleccione --</option>
                        <?php foreach($categorias as $categoria): ?>
                            <option 
                                <?php echo $vacante->categoriaId === $categoria->id ? 'selected' : '';?>
                                value="<?php echo s($categoria->id); ?>">
                                <?php echo s($categoria->categoria); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                </div>
                <div>
                    <label for="requerimiento">Requerimiento:</label>
                    <textarea id="requerimiento" name="vacante[requerimiento]" placeholder="Descripción del cargo"><?php echo s($vacante->requerimiento) ?></textarea>
                </div>
                <div>
                <label for="inclusivoId">¿Es inclusivo?</label>
                <select name="vacante[inclusivoId]" id="inclusivoId">
                        <option value="" selected>-- Seleccione --</option>
                        <?php foreach($inclusivos as $inclusivo): ?>
                            <option 
                                <?php echo $vacante->inclusivoId === $inclusivo->id ? 'selected' : '';?>
                                value="<?php echo s($inclusivo->id); ?>">
                                <?php echo s($inclusivo->estado); ?>
                            </option>
                        <?php endforeach; ?>
                </select>
                </div>
                    
            </fieldset>

            <fieldset class="mt-5">
                <legend>Datos Relevantes</legend>

                <div class="formulario__grid formulario__grid--2">
                    <div>
                        <label for="sueldo">Sueldo:</label>
                        <input type="number" id="sueldo" name="vacante[sueldo]" placeholder="Sueldo" min="1" value="<?php echo s($vacante->sueldo) ?>">
                    </div>
                    <div>
                        <label for="turno">Turno:</label>
                        <input type="text" id="turno" name ="vacante[turno]" placeholder="Turno" value="<?php echo s($vacante->turno) ?>">
                    </div>
                    <div>
                        <label for="horario">Horario:</label>
                        <input type="text" id="horario" name ="vacante[horario]" placeholder="Horario" value="<?php echo s($vacante->horario) ?>">
                    </div>
                    <div>
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="vacante[ciudad]" placeholder="Lugar de Trabajo" value="<?php echo s($vacante->ciudad) ?>">
                    </div>
                    <div>
                        <label for="experiencia">Experiencia:</label>
                        <input type="text" id="experiencia" name ="vacante[experiencia]" placeholder="Experiencia" value="<?php echo s($vacante->experiencia) ?>">
                    </div>
                    <div>
                        <label for="expira">Fecha de Expiración:</label>
                        <input type="date" id="expira" name ="vacante[expira]" placeholder="Fecha expiración" value="<?php echo s($vacante->expira) ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset class="mt-5"> 
                <legend>Responsable de Ingreso</legend>
                <label for="funcionario">Funcionario</label>
                    <select name="vacante[funcionarioId]" id="funcionario">
                        <option value="" selected>-- Seleccione --</option>
                        <?php foreach($funcionarios as $funcionario): ?>
                            <option 
                                <?php echo $vacante->funcionarioId === $funcionario->id ? 'selected' : ''?>
                                value="<?php echo s($funcionario->id); ?>">
                                <?php echo s($funcionario->nombre) . " " . s($funcionario->apellido); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
            </fieldset>