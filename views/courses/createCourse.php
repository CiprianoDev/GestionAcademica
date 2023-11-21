<link rel="stylesheet" href="build/css/edit-course.css">
<link rel="stylesheet" href="build/css/menu.css">

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content"> 
        <h1>Sistema</h1>
        <div class="contenedor">

        <form action="/create-course" class="form" method="post" >
                <label class="title">Registrar nuevo Curso</label>

                <?php include_once __DIR__ . "/../templates/alerts.php" ?>

                <div class="field">
                    <label for="folio">Folio:</label>
                    <input type="text" name="folio" id="folio" value="<?= $folio ?>">
                </div>
                <div class="field">
                    <label for="name">Nombre del curso:</label>
                    <input type="text" name="name" id="name" value="<?= $name ?>">
                </div>
                <div class="field">
                    <label for="instructor">Instructor:</label>
                    <input type="text" name="instructor" id="instructor" value="<?= $instructor ?>">
                </div>
                <div class="field">
                    <label for="totalHours">Horas:</label>
                    <input type="number" name="totalHours" id="totalHours" value="<?= $totalHours ?>">
                </div>
                <div class="field">
                    <label for="startDate">Fecha de inicio:</label>
                    <input type="date" name="startDate" id="startDate" value="<?= $startDate ?>">
                </div>
                <div class="field">
                    <label for="finishDate">Fecha de fin:</label>
                    <input type="date" name="finishDate" id="finishDate" value="<?= $finishDate ?>">
                </div>
                <div class="field">
                    <label for="period">Periodo:</label>
                    <input type="text" name="period" id="period" value="<?= $period ?>">
                </div>
                <div class="field">
                    <label for="classroom">Aula:</label>
                    <input type="text" name="classroom" id="classroom" value="<?= $classroom ?>">
                </div>
                <div class="field">
                    <label for="name">Tipo:</label>
                    <input type="text" name="type" id="type" value="<?= $typeC ?>">
                </div>

                <input type="submit" class="button" value="Registrar">
            </form>
        </div>
    </main>
</div>