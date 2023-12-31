<style>
    .content {
        width: 100%;
        margin-right: 50px;
    }
    h1 {
        margin-top: 40px;
        color: #000;
        font-size: 48px;
        font-family: Inter;
        font-weight: 500;
        word-wrap: break-word;
    }
    h2 {
        margin-top: 40px;
        color: #000;
        font-family: Inter;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-align: left;
    }
    .options {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
    }
    .search {
        display: flex;
        gap: 30px;
    }
    .search-bar {
        width: 400px;
        height: 50px;
        display: flex;
    }
    .search-input {
        width: 100%;
        height: 100%;
        border: 1px solid #000;
        border-radius: 20px;
        padding: 5px 20px;
    }
    .icon {
        width: 32px;
    }
    .icon-search {
        margin-left: -50px;
    }
    table {
        display: flex;
        margin-top: 30px;
        margin-right: 50px;
        flex-direction: column;
        align-items: center;
    }
    .first-column {
        width: 300px;
    }
    th, td {
        border: 1.2px solid #dbdbdb;
    }
    thead > tr {
        display: flex;
        align-items: center;
        gap: -34px;
    }
    thead > tr > th {
        display: flex;
        width: 150px;
        padding: 22px;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    tbody > tr {
        display: flex;
        align-items: center;
    }

    tbody > tr > td {
        display: flex;
        width: 150px;
        height: 82px;
        padding: 22px;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }
    td > button {
        padding: 12px;
        cursor: pointer;
    }
    p {
        color: #000;
    }
    summary {
        font-size: 2rem;
    }
    .teacher-name {
        font-size: 2rem;
        margin-top: 1em;
        margin-left: 3em;
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .btn-enroll {
        background-color: #C3D3EE;
        color: #000;
        border: none;
        padding: 1.5rem;
        border-radius: 10px;
        cursor: pointer;
    }
    .btn-enroll:hover {
        background-color: rgba(0, 71, 186, .4);
    }
    .header-payroll {
        height: 19.2px;
    }
    .column-payroll {
        width: 50px;
    }
    .column-delete {
        width: 80px;
        height: 19.2px;
    }
    .delete-button {
        background-color: #fff;
        border: none;
        cursor: pointer;
    }
    .column-accredited {
        width: 280px;
    }
    select {
        padding: 1.2rem 1rem;
        background-color: #fff;
        border: 1px solid #8692a6;
    }
    .btn-accredited {
        padding: 1.2rem 1rem;
        cursor: pointer;
    }
</style>

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>
    <?php $nameTeachersEnrolled = [];
    ?>

    <main class="content">

        <h2><?= $course['name']; ?> (<?= $course['folio']; ?>)</h2>
        <p><strong>Instructor:</strong> <?= $course['instructor']; ?></p>
        <p><strong>Horas totales:</strong> <?= $course['totalHours']; ?></p>
        <p><strong>Periodo:</strong> <?= $course['period']; ?></p>
        <p><strong>Inicio-Fin del curso:</strong> <?= $course['startDate']; ?> - <?= $course['finishDate']; ?></p>
        <p><strong>Aula:</strong> <?= $course['classroom']; ?></p>
        <p><strong>Tipo de curso:</strong> <?= $course['type']; ?></p>        
        <details open>
            <summary class="enrolled"><strong>Profesores inscritos:</strong></summary>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Academia</th>
                        <th>Grado</th>
                        <th>Eliminar del curso</th>
                        <th class="column-accredited">Acreditar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $indice = 0;
                foreach($history as $historyObject) {
                    $historyData = get_object_vars($historyObject);
                    array_push($nameTeachersEnrolled, $historyData['name']);
                    $academiesArray = get_object_vars($academies[$indice]);
                    ?>
                    <tr>
                        <td><?= $historyData['name'] ?></td>
                        <td><?= $academiesArray['nameAcademy'] ?></td>
                        <td><?= $historyData['grade'] ?></td>
                        <td>
                            <form action="/undo-enroll" method="post">
                                <p class="teacher-name">
                                    <input type="hidden" name="history" value="<?= $historyData['idHistory'] ?>">
                                    <input type="hidden" name="course" value="<?= $_GET['course']; ?>">
                                    <button type="submit" class="delete-button">
                                        <img src="build/img/icon_delete.svg" alt="Icono eliminar">
                                    </button>
                                </p>
                            </form>
                        </td>
                        <td class="column-accredited">
                            <form action="/accredit-course" method="post">
                                <input type="hidden" name="idHistory" value="<?= $historyData['idHistory'] ?>">
                                <input type="hidden" name="idTeacher" value="<?= $historyData['id'] ?>">
                                <input type="hidden" name="idCourse" value="<?= $course['id'] ?>">
                                <input type="hidden" name="folioCourse" value="<?= $course['folio'] ?>">
                                <select name="accredited" id="accredited">
                                    <option value="0" <?php if ($historyData['status'] == "0") { ?> selected <?php } ?>>Pendiente</option>
                                    <option value="1" <?php if ($historyData['status'] == "1") { ?> selected <?php } ?>>Acreditado</option>
                                    <option value="-1" <?php if ($historyData['status'] == "-1") { ?> selected <?php } ?>>No acreditado</option>
                                </select>
                                <button type="submit" class="btn-accredited">Guardar</button>
                            </form>
                        </td>
                    </tr>
                <?php 
                    $indice++;
                }
                ?>
                </tbody>
            </table>
        </details>

        <div class="options">
            <div class="search">
                <form method="post">
                    <div class="search-bar">
                        <input type="text" class="search-input" name="teacher" placeholder="Buscar profesor...">
                        <img src="build/img/icon_search.svg" alt="Icono búsqueda" class="icon icon-search">
                    </div>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="first-column">Profesor</th>
                    <th>Agregar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nameAllTeachers = [];
                $diff = array_diff($nameAllTeachers, $nameTeachersEnrolled);
                    foreach($teachers as $teacherObject) {
                        $teacher = get_object_vars($teacherObject);
                        if (array_search($teacher['name'], $nameTeachersEnrolled)) {
                            continue;
                        }
                ?>
                    <tr>
                        <td class="first-column"><?= $teacher['name'] ?></td>
                        <form action="/enroll-teacher" method="post">
                            <td>
                                <input type="hidden" name="teacher" value="<?= $teacher['payroll'] ?>">
                                <input type="hidden" name="course" value="<?= $course['folio'] ?>">
                                <button type="submit" class="btn-enroll">Inscribir</button>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</div>