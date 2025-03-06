<?php

require 'vendor/autoload.php';
use Faker\Factory;

$pdo = new PDO("mysql:host=localhost;dbname=faker", "root", "1234");
$faker = Factory::create('en_PH');




for ($i = 1; $i <= 50; $i++) {
    $stmt = $pdo->prepare("INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $faker->company,
        $faker->phoneNumber,
        $faker->email,
        $faker->streetAddress,
        $faker->city,
        'Philippines',
        $faker->postcode
    ]);
}


for ($i = 1; $i <= 200; $i++) {
    $stmt = $pdo->prepare("INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $faker->lastName,
        $faker->firstName,
        $faker->numberBetween(1, 50),
        $faker->address
    ]);
}


for ($i = 1; $i <= 500; $i++) {
    $stmt = $pdo->prepare("INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $faker->numberBetween(1, 200), 
        $faker->numberBetween(1, 50),
        $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'), 
        $faker->word,
        $faker->sentence,
        strtoupper($faker->bothify('DOC###???'))
    ]);
}

echo "Fake data successfully inserted into the database!";

?>