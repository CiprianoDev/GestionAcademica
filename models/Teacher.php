<?php

namespace Models;

class Teacher extends ActiveRecord{
    protected static $table = 'teachers';
    protected static $dbColumns = ['id','payroll','name','curp','rfc','academy','grade'];

    public $id;
    public $payroll;
    public $name;
    public $curp;
    public $rfc;
    public $academy;
    public $grade;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->payroll = $args['payroll'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->curp = $args['curp'] ?? '';
        $this->rfc = $args['rfc'] ?? '';
        $this->academy = $args['academy'] ?? '';
        $this->grade = $args['grade'] ?? '';
    }

    public function validate()
    {
        
        if(!$this->payroll){
            self::$alerts['error'][] = 'El numero de nomina es obligatorio';
        }
        if(!$this->name){
            self::$alerts['error'][] = 'Ingresa el nombre del profesor';
        }
        if(!$this->curp){
            self::$alerts['error'][] = 'La CURP es obligatoria';
        }
        if(!$this->rfc){
            self::$alerts['error'][] = 'El RFC es obligatorio';
        }
        if(!$this->academy){
            self::$alerts['error'][] = 'Seleccion una academia';
        }
        if(!$this->grade){
            self::$alerts['error'][] = 'Selecciona un grado';
        }
        return self::$alerts;
    }
}