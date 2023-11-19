<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($_GET['country']) {
    $country = $_GET['country'];
    $query = "SELECT Name, Continent, IndepYear, HeadOfState FROM Country WHERE Name LIKE '%$country%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        echo '<table>';
        echo '<tr><th>Country Name</th><th>Continent</th><th>Independence Year</th><th>Head of State</th></tr>';

        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Continent'] . '</td>';
            echo '<td>' . $row['IndepYear'] . '</td>';
            echo '<td>' . $row['HeadOfState'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No results found.';
    }
} else {
    $stmt = $conn->query("SELECT Name, HeadOfState FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<table>';
    echo '<tr><th>Country Name</th><th>Ruled By</th></tr>';

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['HeadOfState'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>
