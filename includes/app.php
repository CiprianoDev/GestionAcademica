<?php 

require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conect to database
use Models\ActiveRecord;
ActiveRecord::setDB($db);