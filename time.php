<?php

require 'vendor/autoload.php';
include_once "Database.php";
use Carbon\Carbon;

$database = new Database();
$query = $database->prepare("SELECT * FROM `keys`");
$query->execute();
$rows = $query->fetchAll();


$start = new Carbon();
?>