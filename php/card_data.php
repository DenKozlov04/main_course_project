<?php
include 'dbconfig.php';

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$sql = "SELECT city, arrival_city, price, image FROM countrycards";
$result = $mysqli->query($sql);

echo '<div class="gallery-grid">'; 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $city = $row['city'];
        $arrival_city = $row['arrival_city'];
        $price = $row['price'];
        $image = $row['image'];

        echo '<div class="gallery-item">'; 
        echo '<div class="grid-item__inner">';
        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" class="grid-item__img" style="width: 358px; height: 348px; border-radius: 10px; " alt="Image Description">';
        echo '<div class="place1">';
        echo '<span>' . $city . ' -</span>';
        echo '</div>';
        echo '<div class="place2">';
        echo '<span>' . $arrival_city . '</span>';
        echo '</div>';
        echo '<div class="grid-item_title">';
        echo '<div>';
        echo '<span class="price">From ' . $price . '</span>';
        echo '</div>';
        echo '<button class="Buy">Buy tickets</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>'; 
    }
} else {
    echo "Записей не найдено.";
}

echo '</div>'; 

$mysqli->close();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
</html>
