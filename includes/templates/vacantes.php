<?php
    
    use App\Vacante;
    $vacante = Vacante::all();
?>


<div class="vacantes__grid mt-5 m-5">
    <?php foreach($vacante as $vacantes) : ?>
    <div class="vacante-laboral">
        <h3 class="vacante-laboral__heading"><?php echo $vacantes->cargo; ?></h3>
        <p class="vacante-laboral__texto"><?php echo $vacantes->requerimiento; ?></p>
        <p class="vacante-laboral__expiracion"><?php echo $vacantes->expira; ?></p>
        <a href="vacante-info.php?id=<?php echo $vacantes->id; ?>" class="vacante-laboral__enlace">Click para ver vacante</a>
    </div> <!-- Fin Vacante Laboral-->
    <?php endforeach; ?>
</div>

<?php
    
    mysqli_close($db);

?>