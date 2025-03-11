<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Fake na tao sa Pinas xD!</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Complete Address</th>
                    <th>Birthdate</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    $fullName = $faker->firstName . ' ' . $faker->lastName;
                    $email = strtolower(str_replace(' ', '', $fullName)) . "@gmail.com";
                    $phone = "+63 9" . $faker->randomNumber(2, true) . " " . $faker->randomNumber(4, true) . " " . $faker->randomNumber(4, true);
                    $address = $faker->streetAddress . ", " . $faker->city . ", " . $faker->state;
                    $birthdate = $faker->date('Y-m-d');
                    $jobTitle = $faker->jobTitle;

                    echo "<tr>
                            <td>$fullName</td>
                            <td>$email</td>
                            <td>$phone</td>
                            <td>$address</td>
                            <td>$birthdate</td>
                            <td>$jobTitle</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
