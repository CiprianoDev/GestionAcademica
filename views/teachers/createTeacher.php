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

            <form action="/create-teacher" class="form" method="post">
                <label class="title">Registrar Nuevo Profesor</label>

                <?php include_once __DIR__ . "/../templates/alerts.php" ?>

                <div class="field">
                    <label for="payroll">Número de Nómina:</label>
                    <input type="text" name="payroll" id="payroll" value="<?php echo $teacher->payroll;?>">
                </div>
                <div class="field">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="<?php echo $teacher->name;?>">
                </div>
                <div class="field">
                    <label for="curp">CURP:</label>
                    <input type="text" name="curp" id="curp" value="<?php echo $teacher->curp;?>">
                </div>
                <div class="field">
                    <label for="rfc">RFC:</label>
                    <input type="text" name="rfc" id="rfc" value="<?php echo $teacher->rfc;?>">
                </div>

                <div class="field">
                    <label for="academy">Academia:</label>
                    <select name="academy" id="academy">
                        <option value="Academia 1">Academia 1</option>
                        <option value="Academia 2">Academia 2</option>
                        <option value="Academia 3">Acdemia 3</option>
                    </select>

                </div>
                <div class="field">
                    <label for="grade">Grado:</label>
                    <select name="grade" id="grade">
                        <option value="Grado 1">Grado 1</option>
                        <option value="Grado 2">Grado 2</option>
                        <option value="Grado 3">Grado 3</option>
                    </select>
                </div>

                <input type="submit" class="button" value="Registrar">
            </form>
        </div>
    </main>
</div>