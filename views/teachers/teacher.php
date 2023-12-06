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
            <div class="search">
                <img src="build/img/icon_filter.svg" alt="Icono Filtrar" class="icon">
                <form method="post">
                    <div class="search-bar">
                        <input name="teacher" type="text" class="search-input" placeholder="Buscar Profesor...">
                        <img src="build/img/icon_search.svg" alt="Icono búsqueda" class="icon icon-search">
                    </div>
                </form>
            </div>
            <div>
                <a href="/create-teacher" class="btn-add">
                    <img src="build/img/icon_add.svg" alt="Icono Agregar" class="icon">
                    Agregar
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="first-column">Profesores</th>
                    <th>Cursos</th>
                    <th>Acreditados</th>
                    <th>No acreditados</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
           <?php
                $indice = 0;
                foreach ($allTeachers as $teacher):
                    
            ?> 
                <tr>
                    <td class="first-column"><?php echo $teacher->name;?></td>
                    <td><?= $teachersEnrolled[$indice] ?></td>
                    <td>0</td>
                    <td>0</td>
                    <td class="actions">
                        <p>
                            <a href="/edit-teacher?payroll=<?php echo $teacher->payroll; ?>">
                                <img src="build/img/icon_edit.svg" alt="Icono editar">
                            </a>
                        </p>
                        <p>
                            <form action="/delete-teacher" method="post">
                                <input type="text" name="payroll" value="<?php echo $teacher->payroll;?>" hidden>
                                <button type="submit" class="delete-button">
                                    <!-- <a href=""> -->
                                        <img src="build/img/icon_delete.svg" alt="Icono eliminar">
                                    <!-- </a> -->
                                </button>
                            
                            </form>
                        </p>
                    </td>
                </tr>
            <?php 
                $indice++;     
            endforeach;
            ?> 
            </tbody>
        </table>
    </main>
</div>