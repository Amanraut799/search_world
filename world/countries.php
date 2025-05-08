
<?php

// subregion.php

$connection = new mysqli("localhost", "root", "", "world");


$sql = "SELECT * FROM countries ";

$result = mysqli_query($connection, $sql);
$regions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $regions[] = $row;
}

echo json_encode($regions);
mysqli_close($connection);