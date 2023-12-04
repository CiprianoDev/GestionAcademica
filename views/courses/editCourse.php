<link rel="stylesheet" href="build/css/edit-course.css">
<link rel="stylesheet" href="build/css/menu.css">

<?php

$cursoFormacion = "Curso de formación académica";
$cursoActualizacion = "Curso de actualización";

?>

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content">
        <h1>Sistema</h1>
        <div class="contenedor">

            <form class="form width-100" method="post">
                <label class="title">Editar Curso</label>
                <input type="text" name="folio" value="<?= $course->folio; ?>" hidden>

                <?php include_once __DIR__ . "/../templates/alerts.php" ?>

                <div class="columns">
                    <div class="field">
                        <label for="folio">Folio:</label>
                        <input type="text" name="folio" id="folio" value="<?= $course->folio; ?>" disabled>
                    </div>
                    <div class="field">
                        <label for="name">Nombre del curso:</label>
                        <input type="text" name="name" id="name" value="<?= $course->name; ?>">
                    </div>
                    <div class="field">
                        <label for="instructor">Instructor:</label>
                        <input type="text" name="instructor" id="instructor" value="<?= $course->instructor; ?>">
                    </div>
                    <div class="field">
                        <label for="totalHours">Horas:</label>
                        <input type="number" name="totalHours" id="totalHours" value="<?= $course->totalHours ?>">
                    </div>
                    <div class="field">
                        <label for="startDate">Fecha de inicio:</label>
                        <input type="date" name="startDate" id="startDate" value="<?= $course->startDate ?>">
                    </div>
                    <div class="field">
                        <label for="finishDate">Fecha de fin:</label>
                        <input type="date" name="finishDate" id="finishDate" value="<?= $course->finishDate ?>">
                    </div>
                    <div class="field">
                        <label for="period">Periodo:</label>
                        <input type="text" name="period" id="period" value="<?= $course->period; ?>">
                    </div>
                    <div class="field">
                        <label for="classroom">Aula:</label>
                        <select name="classroom" id="classroom">
                            <option value="A1" <?php if ("A1" == $course->classroom) { ?> selected <?php } ?>>A1</option>
                            <option value="A2" <?php if ("A2" == $course->classroom) { ?> selected <?php } ?>>A2</option>
                            <option value="A3" <?php if ("A3" == $course->classroom) { ?> selected <?php } ?>>A3</option>
                            <option value="A4" <?php if ("A4" == $course->classroom) { ?> selected <?php } ?>>A4</option>
                            <option value="A5" <?php if ("A5" == $course->classroom) { ?> selected <?php } ?>>A5</option>
                            <option value="A6" <?php if ("A6" == $course->classroom) { ?> selected <?php } ?>>A6</option>
                            <option value="A7" <?php if ("A7" == $course->classroom) { ?> selected <?php } ?>>A7</option>
                            <option value="A8" <?php if ("A8" == $course->classroom) { ?> selected <?php } ?>>A8</option>
                            <option value="Laboratorio de redes" <?php if ("Laboratorio de redes" == $course->classroom) { ?> selected <?php } ?>>Laboratorio de redes</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="type">Tipo:</label>
                        <select name="type" id="type">
                            <option value="<?= $cursoFormacion; ?>" <?php if ($cursoFormacion == $course->type) { ?> selected <?php } ?>>Curso de formación académica</option>
                            <option value="<?= $cursoActualizacion; ?>" <?php if ($cursoActualizacion == $course->type) { ?> selected <?php } ?>>Curso de actualización</option>
                        </select>
                    </div>
                </div>

                <div class="center">
                    <input type="submit" class="button" value="Editar">
                </div>

            </form>
        </div>
    </main>
</div>