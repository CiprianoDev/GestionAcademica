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
                            <option value="Grado 1" <?php if ("Grado 1" == $teacher->grade) { ?> selected <?php } ?>>Grado 1</option>
                            <option value="Grado 2" <?php if ("Grado 2" == $teacher->grade) { ?> selected <?php } ?>>Grado 2</option>
                            <option value="Grado 3" <?php if ("Grado 3" == $teacher->grade) { ?> selected <?php } ?>>Grado 3</option>
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