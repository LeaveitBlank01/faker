<?php

require 'vendor/autoload.php';
use Faker\Factory;

$pdo = new PDO("mysql:host=localhost;dbname=faker", "root", "1234");
$faker = Factory::create('en_PH');

?>