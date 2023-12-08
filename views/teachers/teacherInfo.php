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
    <?php 
        include_once __DIR__ . '/../templates/menu.php';
        $status = ['Inactivo', 'Activo'];
    ?>
    <main class="content">

        <h2>Datos del profesor</h2>
        <p><strong>Número de nómina:</strong> <?= $teacherInfo['payroll']; ?></p>
        <p><strong>Nombre:</strong> <?= $teacherInfo['name']; ?></p>
        <p><strong>Email:</strong> <?= $teacherInfo['email']; ?></p>
        <p><strong>CURP:</strong> <?= $teacherInfo['curp']; ?></p>
        <p><strong>RFC:</strong> <?= $teacherInfo['rfc']; ?></p>
        <p><strong>Sexo:</strong> <?= $teacherInfo['genre']; ?></p>
        <p><strong>Grado:</strong> <?= $teacherInfo['grade']; ?></p>
        <p><strong>Academia:</strong> <?= $academy['nameAcademy']; ?></p>
        <p><strong>Estado:</strong> <?= $status[$teacherInfo['status']] ?></p>
        <details open>
            <summary class="enrolled"><strong>Cursos inscritos:</strong></summary>
            <table>
                <thead>
                    <tr>
                        <th class="column-accredited">Curso</th>
                        <th>Acreditado</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($courses); $i++) { ?>
                    <tr>
                        <td class="column-accredited"><?= $courses[$i] ?></td>
                        <td>
                            <?php if ($status[$i] == -1) {
                                echo "No acreditado";
                            } else if ($status[$i] == 1) {
                                echo "Acreditado";
                            } else {
                                echo "Pendiente";
                            }
                            ?>
                        </td>
                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </details>

    </main>
</div>