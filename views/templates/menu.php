<?php

$dashboradURI = '/dashboard';
$reportsURI = '/reports';
$coursesURI = '/courses';
$teachersdURI = '/teachers';

$requestURI = $_SERVER['REQUEST_URI'];

?>
<aside>
    <nav>
        <img src="build/img/logoITSU.png" alt="Logo del Instituto Tecnológico Superior de Uruapan" class="logo_tec">
        <ul>
            <li class="link_item <?= isSelected($requestURI, substr($dashboradURI, 1, 3)); ?>">
                <a class="link" href="<?= $dashboradURI; ?>">
                    <img src="build/img/icon_home.svg" alt="Icono Inicio" class="icon">
                    <p class="">Principal</p>
                </a>
            </li>
            <li class="link_item <?= isSelected($requestURI, substr($reportsURI, 1, 3)); ?>">
                <a class="link" href="<?= $reportsURI; ?>">
                    <img src="build/img/icon_file.svg" alt="Icono Reportes" class="icon">
                    <p class="">Reportes</p>
                </a>
            </li>
            <li class="link_item <?= isSelected($requestURI, substr($coursesURI, 1, 3)); ?>">
                <a class="link" href="<?= $coursesURI; ?>">
                    <img src="build/img/icon_certificate.svg" alt="Icono Cursos" class="icon">
                    <p class="">Cursos</p>
                </a>
            </li>
            <li class="link_item <?= isSelected($requestURI, substr($teachersdURI, 1, 3)); ?>">
                <a class="link" href="<?= $teachersdURI; ?>">
                    <img src="build/img/icon_people.svg" alt="Icono Profesores" class="icon">
                    <p class="">Profesores</p>
                </a>
            </li>
        </ul>
    </nav>
</aside>