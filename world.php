<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['country'];

if (isset($_GET['lookup'])){
  $lookup = $_GET['lookup'];
  $stmt = $conn->query("SELECT cities.name AS city_name, cities.district, cities.population, countries.name AS country_name FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <?php if ($lookup === 'cities'): ?>
        <tr>
            <th>City Name</th>
            <th>District</th>
            <th>Population</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['city_name']; ?></td>
                <td><?= $row['district']; ?></td>
                <td><?= $row['population']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['continent']; ?></td>
                <td><?= $row['independence_year']; ?></td>
                <td><?= $row['head_of_state']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>