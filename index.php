<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pawsome Adoption</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHybGl5Q4A108Dq_ivzKHfgKvF4T2MPFj3gw&s" alt="Pawsome Adoption"></div>
    <h1>Pawsome Adoption</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Adopt</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Signup</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
  <section class="intro">
    <p>Welcome to Pawsome Adoption, where you can find your new best friend! We are dedicated to finding loving homes for animals in need. Our mission is to provide a safe haven for animals and connect them with caring individuals who will give them the love and attention they deserve.</p>
    <p>Our vision is a world where every pet has a loving home, and we strive to make this vision a reality by promoting adoption, responsible pet ownership, and community education.</p>
  </section>
  <section class="pets">
    <?php
    $sql = "SELECT * FROM pets";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='pet'>";
            echo "<img src='".$row['image']."' alt='Pet'>";
            echo "<h2>".$row['name']."</h2>";
            echo "<p>Age: ".$row['age']." years</p>";
            echo "<p>Breed: ".$row['breed']."</p>";
            echo "<p>Gender: ".$row['gender']."</p>";
            echo "<a href='adopt.php?petId=".$row['id']."' class='adopt-button'>Adopt Me!</a>";
            echo "</div>";
        }
    } else {
        echo "No pets available for adoption.";
    }
    ?>
  </section>
  <footer class="contact">
    <div class="footer-content">
    <h3>Contact Us</h3>
    <p>Follow us on Instagram: <a href="#">@pawsomeadoption</a></p>
    <p>Telephone: 1-800-PET-LOVE</p>
    <p>Twitter: <a href="#">@pawsomeadoption</a></p>
    </div>
  </footer>
  <script src="scripts.js"></script>
</body>
</html>
