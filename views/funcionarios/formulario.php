<fieldset>
    <legend>Información del/la funcionario/a</legend>
                
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="funcionario[nombre]" placeholder="Nombre Funcionario(a)" value="<?php echo s($funcionario->nombre) ?>">
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="funcionario[apellido]" placeholder="Apellido" value="<?php echo s($funcionario->apellido) ?>">
        </div>
        <div>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="funcionario[correo]" placeholder="Correo Electrónico" value="<?php echo s($funcionario->correo) ?>">
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="funcionario[password]" placeholder="Ingrese una contraseña" value="<?php echo s($funcionario->password) ?>">
        </div>
        <div>
            <label for="rpassword">Repetir Contraseña:</label>
            <input type="password" id="rpassword" name="funcionario[rpassword]" placeholder="Repita la contraseña" value="<?php echo s($funcionario->rpassword) ?>">
        </div>
    </div>
</fieldset>