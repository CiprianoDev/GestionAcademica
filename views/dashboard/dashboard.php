<style>

    /* Table */
    table {
        display: flex;
        width: auto;
        height: auto;
        flex-direction: column;
        align-items: flex-start;
        flex-shrink: 0;
        margin-top: 50px;
    }

    thead>tr {
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

    tbody>tr {
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

    table,
    th,
    td {
        border: 1.2px solid #dbdbdb;
        margin-top: 1rem;
    }
    h1 {
        margin-top: 5rem;
    }

    .screen {
        width: 100rem;
        margin-top: 5rem;
        display: flex;
        justify-content: space-evenly;
    }

    .item {
        width: 30rem;
        height: 20rem;
        flex-shrink: 0;
        background-color: red;
        padding: 2rem;
        margin: 1rem;
    }

    .one {
        border-radius: 1.5rem;
        background: var(--Azul-3, #C3D3EE);
    }

    .two {
        border-radius: 1.5rem;
        background: var(--Secundario2, #DAECEC);
    }

    .three {
        border-radius: 1.5rem;
        background: var(--Secundario3, #BCC8DC);
    }

    .description {
        color: #000;
        font-family: Inter;
        font-size: 2rem;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: center;
        margin-top: 5rem;
    }

    .number {
        color: #000;
        font-family: Inter;
        font-size: 5.6rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-align: center;
        margin: 0;
    }
</style>
<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content">
        <h1>Sistema</h1>
        <div class="screen">
            <div class="item one">
                <p class="number"><?php echo $TotalTeachers->value; ?></p>
                <p class="description">Profesores Activos</p>
            </div>
            <div class="item two">
                <p class="number"><?php echo $TotalCourses->value; ?></p>
                <p class="description">Cursos</p>
            </div>
            <div class="item three">
                <p class="number"><?php echo $TotalCapacitados->value; ?></p>
                <p class="description">Capacitaciones</p>
            </div>
        </div>

        <h4 class="margin">Último Reporte::</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes con al menos un curso</th>
                            <th>Docentes sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalCapacitados->value; ?></td>
                            <td><?php echo ($TotalTeachers->value - $TotalCapacitados->value); ?></td>
                            <td><?php echo $TotalTeachers->value; ?></td>


                        </tr>
                    </tbody>
                </table>
    </main>
</div>