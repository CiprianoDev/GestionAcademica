<link rel="stylesheet" href="build/css/edit-course.css">
<link rel="stylesheet" href="build/css/menu.css">

<?php

$cursoFormacion = "Curso de formación académica";
$cursoActualizacion = "Curso de actualización";

?>

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content">

        <div class="contenedor">

            <form class="form width-100" method="post">
                <label class="title">Actualizar Información</label>

                <?php include_once __DIR__ . "/../templates/alerts.php" ?>
                <div class="columns">
                    <div class="field">
                        <label for="payroll">Número de Nómina:</label>
                        <input type="text" name="payroll" id="payroll" value="<?php echo $teacher->payroll; ?>">
                    </div>
                    <div class="field">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" value="<?php echo $teacher->name; ?>">
                    </div>
                    <div class="field">
                        <label for="name">Email:</label>
                        <input type="text" name="email" id="email" value="<?php echo $teacher->email; ?>">
                    </div>
                    <div class="field">
                        <label for="curp">CURP:</label>
                        <input type="text" name="curp" id="curp" value="<?php echo $teacher->curp; ?>">
                    </div>
                    <div class="field">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" id="rfc" value="<?php echo $teacher->rfc; ?>">
                    </div>

                    <div class="field">
                        <label for="academy">Academia:</label>

                        <select name="idAcademy" id="academy">
                            <?php foreach($academies as $academyObject): ?>
                                <?php $academy = get_object_vars($academyObject); 
                                ?>
                                <option value="<?= $academy['idAcademy'] ?>"  <?php if ($academy['idAcademy'] == $teacher->idAcademy) { ?> selected <?php } ?>><?= $academy['nameAcademy'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label for="grade">Grado:</label>
                        <select name="grade" id="grade">
                            <option value="Licenciatura" <?php if ("Licenciatura" == $teacher->grade) { ?> selected <?php } ?>>Licenciatura</option>
                            <option value="Maestria" <?php if ("Maestria" == $teacher->grade) { ?> selected <?php } ?>>Maestria</option>
                            <option value="Doctorado" <?php if ("Doctorado" == $teacher->grade) { ?> selected <?php } ?>>Doctorado</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="gener">Grado:</label>
                        <select name="gener" id="gener">
                            <option value="Masculino" <?php if ("Masculino" == $teacher->sexo) { ?> selected <?php } ?>>Masculino</option>
                            <option value="Femenino" <?php if ("Femenino" == $teacher->sexo) { ?> selected <?php } ?>>Femenino</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="sexo">Estado:</label>
                        <select name="active" id="active">
                            <option value="1" <?php if ("Activo" == $teacher->active) { ?> selected <?php } ?>>Activo</option>
                            <option value="0" <?php if ("Inactivo" == $teacher->active) { ?> selected <?php } ?>>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="center">
                    <input type="submit" class="button" value="Guardar">
                </div>
            </form>
        </div>
    </main>
</div>