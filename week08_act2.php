<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

// Predefined genres
$genres = [
    "Fiction",
    "Mystery",
    "Science Fiction",
    "Fantasy",
    "Romance",
    "Thriller",
    "Historical",
    "Horror"
];

// Generate 15 books
$books = [];
for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'title' => ucfirst($faker->words(3, true)), // Capitalize the title
        'author' => $faker->name(),
        'genre' => $faker->randomElement($genres),
        'year' => $faker->numberBetween(1900, 2024),
        'isbn' => $faker->isbn13(),
        'summary' => htmlspecialchars(implode("\n\n", $faker->paragraphs(2))) // Fix paragraph issue
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Books Table</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">Generated Fake Books</h2>

        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Publication Year</th>
                        <th>ISBN</th>
                        <th>Summary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= htmlspecialchars($book['genre']) ?></td>
                            <td><?= $book['year'] ?></td>
                            <td><?= $book['isbn'] ?></td>
                            <td class="text-start"><?= nl2br($book['summary']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
