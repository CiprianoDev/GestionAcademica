<?php

namespace Models;

class History extends ActiveRecord {

    protected static $table = 'history';
    protected static $dbColumns = [
        'idHistory', 
        'idTeacher', 
        'idCourse', 
        'status'
    ];
    
    public $idHistory;
    public $idTeacher;
    public $idCourse;
    public $status;

    public function __construct($args = []) {
        $this->idHistory = $args['idHistory'] ?? null;
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

    public function getHistoryCourse($idCourse) {
        $allHistory = $this->SQL("SELECT * FROM history AS H JOIN teachers as T ON H.idTeacher = T.id WHERE H.idCourse = $idCourse ORDER BY T.name");
        return $allHistory;
    }

    public function undoEnrollTeacher($idHistory) {
        try {
            $this->delete(self::$dbColumns[0], $idHistory);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}