<?php

$dashboradURI = '/dashboard';
$reportsURI = '/reports';
$coursesURI = '/courses';
$teachersdURI = '/teachers';
$logOutURI = '/logout';

$requestURI = $_SERVER['REQUEST_URI'];

?>
<aside>
    <nav>
        <img src="build/img/logoITSU.png" alt="Logo del Instituto Tecnológico Superior de Uruapan" class="logo_tec">
        <ul>
            <li class="link_item <?= isItemMenuSelected($requestURI, substr($dashboradURI, 1, 3)); ?>">
                <a class="link" href="<?= $dashboradURI; ?>">
                    <img src="build/img/icon_home.svg" alt="Icono Inicio" class="icon">
                    <p class="">Principal</p>
                </a>
            </li>
            <li class="link_item <?= isItemMenuSelected($requestURI, substr($reportsURI, 1, 3)); ?>">
                <a class="link" href="<?= $reportsURI; ?>">
                    <img src="build/img/icon_file.svg" alt="Icono Reportes" class="icon">
                    <p class="">Reportes</p>
                </a>
            </li>
            <li class="link_item <?= isItemMenuSelected($requestURI, substr($coursesURI, 1, 3)); ?>">
                <a class="link" href="<?= $coursesURI; ?>">
                    <img src="build/img/icon_certificate.svg" alt="Icono Cursos" class="icon">
                    <p class="">Cursos</p>
                </a>
            </li>
            <li class="link_item <?= isItemMenuSelected($requestURI, substr($teachersdURI, 1, 3)); ?>">
                <a class="link" href="<?= $teachersdURI; ?>">
                    <img src="build/img/icon_people.svg" alt="Icono Profesores" class="icon">
                    <p class="">Profesores</p>
                </a>
            </li>
            <li class="link_item <?= isItemMenuSelected($requestURI, substr($logOutURI, 1, 3)); ?>">
                <a class="link" href="<?= $logOutURI; ?>">
                    <img src="build/img/icon_logout.svg" alt="Icono Cerrar sesión" class="icon">
                    <p class="">Cerrar sesión</p>
                </a>
            </li>
        </ul>
    </nav>
</aside>