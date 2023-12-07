<?php

namespace Models;

class Academy extends ActiveRecord{
    protected static $table = 'academies';
    protected static $dbColumns = ['idAcademy','nameAcademy'];

    public $id;
    public $nameAcademy;

    public function __construct($args = [])
    {
        $this->id = $args['idAcademy'] ?? null;
        $this->nameAcademy = $args['nameAcademy'] ?? '';
    }

    public function getAllAcademies() {
        return self::all();
    }
}