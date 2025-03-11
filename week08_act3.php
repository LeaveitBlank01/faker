<?php
require 'vendor/autoload.php'; 

use Faker\Factory;

$faker = Factory::create();


$users = [];
for ($i = 0; $i < 10; $i++) {
    $fullName = $faker->name();
    $email = $faker->unique()->email();
    $username = strtolower(explode('@', $email)[0]); 
    $password = bin2hex(random_bytes(8)); 
    $hashedPassword = hash('sha256', $password); 
    $uuid = $faker->uuid();
    $createdAt = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s'); 

    $users[] = [
        'User ID' => $uuid,
        'Full Name' => $fullName,
        'Email' => $email,
        'Username' => $username,
        'Password (SHA-256)' => $hashedPassword,
        'Created At' => $createdAt
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Generated User Accounts</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password (SHA-256)</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <?php foreach ($user as $value): ?>
                                <td><?= htmlspecialchars($value) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
