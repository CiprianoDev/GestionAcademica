<?php

namespace Models;

use DateTime;

class Course extends ActiveRecord {

    protected static $table = 'courses';
    protected static $dbColumns = [
        'id', 
        'folio', 
        'name', 
        'instructor',
        'totalHours',
        'startDate',
        'finishDate',
        'period',
        'classroom',
        'type'];
    

    public $id;
    public $folio;
    public $name;
    public $instructor;
    public $totalHours;
    public $startDate;
    public $finishDate;
    public $period;
    public $classroom;
    public $type;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->folio = $args['folio'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->instructor = $args['instructor'] ?? '';
        $this->totalHours = $args['totalHours'] ?? '';
        $this->startDate = $args['startDate'] ?? '';
        $this->finishDate = $args['finishDate'] ?? '';
        $this->period = $args['period'] ?? '';
        $this->classroom = $args['classroom'] ?? '';
        $this->type = $args['type'] ?? '';
    }

    public function getCourses() {
        $allCourses = $this->all();
        return $allCourses;
    }

    public function getCourse(string $column, string $value) {
        $dataCourse = $this->where($column, $value);
        return $dataCourse;
    }

    public function editCourse() {
        $result = $this->update('folio', $_POST);
        return $result;
    }
}