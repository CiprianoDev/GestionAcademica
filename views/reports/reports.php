<style>
    h1 {
        margin-top: 40px;
        color: #000;
        font-size: 48px;
        font-family: Inter;
        font-weight: 500;
        word-wrap: break-word;
    }

    /* Options */
    .options {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    .icon-add {
        width: 28px;
    }

    .btn-add {
        width: 180px;
        height: 55px;
        background-color: #C3D3EE;
        color: #000;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-shrink: 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 1.2em;
        padding: 0 30px;
    }

    .btn-add:hover {
        background-color: rgba(0, 71, 186, .4);
    }

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

    .margin {
        margin-bottom: 0;
    }
</style>

<div class="container">
    <?php include_once __DIR__ . '/../templates/menu.php'; ?>

    <main class="content">
        <h1>Formación Docente</h1>

        <h4 class="margin">Total de profesores capacitados por Academia:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sistemas</th>
                        <th>Administración</th>
                        <th>Alimentarias</th>
                        <th>Electrónica</th>
                        <th>Mecatrónica</th>
                        <th>Civil</th>
                        <th>Mecánica</th>
                        <th>Industrial</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $TotalSistemasC->value; ?></td>
                        <td><?php echo $TotalAdminC->value; ?></td>
                        <td><?php echo $TotalAlimentariasC->value; ?></td>
                        <td><?php echo $TotalElectronicaC->value; ?></td>
                        <td><?php echo $TotalMecatronicaC->value; ?></td>
                        <td><?php echo $TotalCivilC->value; ?></td>
                        <td><?php echo $TotalMecanicaC->value; ?></td>
                        <td><?php echo $TotalIndustrialC->value; ?></td>
                        <td><?php echo $TotalCapacitados->value; ?></td>

                    </tr>
                </tbody>
            </table>

                <h4 class="margin">Sistemas:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalSistemasC->value; ?></td>
                            <td><?php echo ($TotalSistemas->value - $TotalSistemasC->value); ?></td>
                            <td><?php echo $TotalSistemas->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Administración:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalAdminC->value; ?></td>
                            <td><?php echo ($TotalAdmin->value - $TotalAdminC->value); ?></td>
                            <td><?php echo $TotalAdmin->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Mecánica:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalMecanicaC->value; ?></td>
                            <td><?php echo ($TotalMecanica->value - $TotalMecanicaC->value); ?></td>
                            <td><?php echo $TotalMecanica->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Alimentarias:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalAlimentariasC->value; ?></td>
                            <td><?php echo ($TotalAlimentarias->value - $TotalAlimentariasC->value); ?></td>
                            <td><?php echo $TotalAlimentarias->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Electrónica:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalElectronicaC->value; ?></td>
                            <td><?php echo ($TotalElectronica->value - $TotalElectronicaC->value); ?></td>
                            <td><?php echo $TotalElectronica->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Mecatrónica:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalMecatronicaC->value; ?></td>
                            <td><?php echo ($TotalMecatronica->value - $TotalMecatronicaC->value); ?></td>
                            <td><?php echo $TotalMecatronica->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Civil:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalCivilC->value; ?></td>
                            <td><?php echo ($TotalCivil->value - $TotalCivilC->value); ?></td>
                            <td><?php echo $TotalCivil->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Industrial:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Docentes Con Cursos</th>
                            <th>Docentes Sin cursos</th>
                            <th>Total De Docentes</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?php echo $TotalIndustrialC->value; ?></td>
                            <td><?php echo ($TotalIndustrial->value - $TotalIndustrialC->value); ?></td>
                            <td><?php echo $TotalIndustrial->value; ?></td>


                        </tr>
                    </tbody>
                </table>
                <h4 class="margin">Conteo general:</h3>
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