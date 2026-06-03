<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Книжарница</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>📚 Моята Книжарница</h1>

    <a class="cart-link" href="cart.php">
        🛒 Количка
        <?php
        $count = 0;

        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $qty) {
                $count += $qty;
            }
        }

        echo " ($count)";
        ?>
    </a>
</header>

<div class="container">

<?php

$result = $conn->query("SELECT * FROM books");

while($row = $result->fetch_assoc()) {

?>

<div class="book-card">

    <img src="images/<?php echo $row['image']; ?>">

    <h2><?php echo $row['title']; ?></h2>

    <p><?php echo $row['author']; ?></p>

    <p class="price">
        <?php echo $row['price']; ?> EUR
    </p>

    <a href="book.php?id=<?php echo $row['id']; ?>">
        Детайли
    </a>

    <form action="add_to_cart.php" method="post">
        <input
            type="hidden"
            name="id"
            value="<?php echo $row['id']; ?>"
        >

        <button type="submit">
            Добави в количката
        </button>
    </form>

</div>

<?php } ?>

</div>

</body>
</html>