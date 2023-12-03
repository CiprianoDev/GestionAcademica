<?php

namespace Models;

class History extends ActiveRecord {

    protected static $table = 'history';
    protected static $dbColumns = [
        'id', 
        'idTeacher', 
        'idCourse', 
        'status'
    ];
    
    public $id;
    public $idTeacher;
    public $idCourse;
    public $status;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idTeacher = $args['idTeacher'] ?? '';
        $this->idCourse = $args['idCourse'] ?? '';
        $this->status = $args['status'] ?? '';
    }

    public function addTeacherToCourse($data) {
        $this->sync($data);
        try {
            $result = $this->save();
        } catch (\Throwable $th) {
            return false;
        }
        return $result;
    }
}