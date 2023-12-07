<?php

namespace Controllers;

use Models\ActiveRecord;
use MVC\Router;

class ReportsController
{

    public static function reports(Router $router)
    {
        $TotalSistemasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '1';");
        $TotalAdminC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '2';");
        $TotalMecanicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '3';");
        $TotalAlimentariasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '4';");
        $TotalElectronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '5';");
        $TotalMecatronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '6';");
        $TotalCivilC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '7';");
        $TotalIndustrialC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '8';");
        $TotalCapacitados = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id;");

        $TotalSistemasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '1';");
        $TotalAdminC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '2';");
        $TotalMecanicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '3';");
        $TotalAlimentariasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '4';");
        $TotalElectronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '5';");
        $TotalMecatronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '6';");
        $TotalCivilC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '7';");
        $TotalIndustrialC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '8';");
        $TotalCapacitados = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id;");

        $TotalSistemasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '1';");
        $TotalAdminC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '2';");
        $TotalMecanicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '3';");
        $TotalAlimentariasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '4';");
        $TotalElectronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '5';");
        $TotalMecatronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '6';");
        $TotalCivilC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '7';");
        $TotalIndustrialC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '8';");
        $TotalCapacitados = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id;");

        $TotalSistemasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '1';");
        $TotalAdminC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '2';");
        $TotalMecanicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '3';");
        $TotalAlimentariasC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '4';");
        $TotalElectronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '5';");
        $TotalMecatronicaC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '6';");
        $TotalCivilC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '7';");
        $TotalIndustrialC = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id
        WHERE teachers.idAcademy = '8';");
        $TotalCapacitados = ActiveRecord::SQL(" SELECT COUNT(DISTINCT teachers.id) AS value
        FROM history
        INNER JOIN teachers ON history.idTeacher = teachers.id;");

        //////////// total teacher by academy ////////////
        $TotalSistemas = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '1';");
        $TotalAdmin = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '2';");
        $TotalMecanica = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '3';");
        $TotalAlimentarias = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '4';");
        $TotalElectronica = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '5';");
        $TotalMecatronica = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '6';");
        $TotalCivil = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '7';");
        $TotalIndustrial = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers
        WHERE idAcademy = '8';");
        
        $TotalTeachers = ActiveRecord::SQL(" SELECT COUNT(DISTINCT id) AS value
        FROM teachers;");

        
       
       $router->renderView('reports/reports', [
        'TotalSistemasC' => array_shift($TotalSistemasC),
        'TotalAdminC' => array_shift($TotalAdminC),
        'TotalMecanicaC' => array_shift($TotalMecanicaC),
        'TotalAlimentariasC' => array_shift($TotalAlimentariasC),
        'TotalElectronicaC' => array_shift($TotalElectronicaC),
        'TotalMecatronicaC' => array_shift($TotalMecatronicaC),
        'TotalCivilC' => array_shift($TotalCivilC),
        'TotalIndustrialC' => array_shift($TotalIndustrialC),
        'TotalCapacitados' => array_shift($TotalCapacitados),

        ///

        'TotalSistemas' => array_shift($TotalSistemas),
        'TotalAdmin' => array_shift($TotalAdmin),
        'TotalMecanica' => array_shift($TotalMecanica),
        'TotalAlimentarias' => array_shift($TotalAlimentarias),
        'TotalElectronica' => array_shift($TotalElectronica),
        'TotalMecatronica' => array_shift($TotalMecatronica),
        'TotalCivil' => array_shift($TotalCivil),
        'TotalIndustrial' => array_shift($TotalIndustrial),
        'TotalTeachers' => array_shift($TotalTeachers)
       ]);
    }
}
