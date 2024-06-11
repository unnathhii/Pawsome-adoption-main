<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$petId = $_GET['petId'];
$sql = "SELECT * FROM pets WHERE id='$petId'";
$result = $conn->query($sql);
$pet = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the adoption logic here
    echo "Thank you for adopting ".$pet['name']."!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt <?php echo $pet['name']; ?></title>
</head>
<body>
    <h2>Adopt <?php echo $pet['name']; ?></h2>
    <img src="<?php echo $pet['image']; ?>" alt="Pet">
    <p>Age: <?php echo $pet['age']; ?> years</p>
    <p>Breed: <?php echo $pet['breed']; ?></p>
    <p>Gender: <?php echo $pet['gender']; ?></p>
    <form method="post" action="adopt.php?petId=<?php echo $petId; ?>">
        <button type="submit">Adopt</button>
    </form>
</body>
</html>
