<link rel="stylesheet" href="build/css/menu.css">
<style>
    h1 {
        margin-top: 40px;
        color: #000;
        font-size: 48px;
        font-family: Inter;
        font-weight: 500;
        word-wrap: break-word;
    }
    .btn-add {
        width: 200px;
        height: 65px;
        background-color: #C3D3EE;
        color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
    .btn-add:hover {
        background-color: #0047BA;
        color: #fff;
    }
    table {
        display: flex;
        width: auto;
        height: auto;
        flex-direction: column;
        align-items: flex-start;
        flex-shrink: 0;
        margin-top: 50px;
    }
    thead > tr {
        display: flex;
        align-items: center;
        gap: -34px;
        align-self: stretch;
    }
    th {
        width: 160px;
        padding: 22px 0;
        align-items: center;
        gap: 10px;
    }
    tbody > tr {
        display: flex;
        align-items: center;
        align-self: stretch;
    }
    td {
        display: flex;
        width: 160px;
        height: 82px;
        padding: 22px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-family: Inter;
        font-size: 1.08em;
        font-weight: 500;
    }
    table, th, td {
        border: 1.2px solid #dbdbdb;
    }
    .actions {
        display: flex;
        justify-content: space-around;
    }
    .first-column {
        width: 250px;
        justify-content: start;
    }
    .delete-button {
        background-color: #fff;
        border: none;
        cursor: pointer;
    }
</style>

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content">
        <h1>Sistema</h1>
        <div class="options">
            <!-- <button class="btn-add"> -->
                <a href="/create-course" class="btn-add">Agregar</a>
            <!-- </button> -->
        </div>
        <table>
            <thead>
                <tr>
                    <th class="first-column">Nombre Curso</th>
                    <th>Asistentes</th>
                    <th>Acreditados</th>
                    <th>No acreditados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($allCourses as $objectCourse) {
                    $dataCourse = get_object_vars($objectCourse);
                    //debuguear($dataCourse);
            ?>
                <tr>
                    <td class="first-column"><?= $dataCourse['name']; ?></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td class="actions">
                        <p>
                            <a href="/edit-course?course=<?= $dataCourse['folio'] ?>">
                                <img src="build/img/icon_edit.svg" alt="Icono editar">
                            </a>
                        </p>
                        <p>
                            <form action="/delete-course" method="post">
                                <input type="text" name="folio" value="<?= $dataCourse['folio'] ?>" hidden>
                                <button type="submit" class="delete-button">
                                    <!-- <a href=""> -->
                                        <img src="build/img/icon_delete.svg" alt="Icono eliminar">
                                    <!-- </a> -->
                                </button>
                            
                            </form>
                        </p>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </main>
</div>