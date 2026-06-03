<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Количка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>🛒 Количка</h1>
</header>

<div class="cart-container">

<?php

$total = 0;

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    foreach($_SESSION['cart'] as $id => $qty) {

        $id = (int)$id;

        $result = $conn->query(
            "SELECT * FROM books WHERE id=$id"
        );

        $book = $result->fetch_assoc();

        $subtotal = $book['price'] * $qty;

        $total += $subtotal;

        ?>

        <div class="cart-item">

            <img class="cart-img" src="images/<?php echo $book['image']; ?>">

            <div>

                <h3><?php echo $book['title']; ?></h3>

                <p>Автор: <?php echo $book['author']; ?></p>

                <p>Количество: <?php echo $qty; ?></p>

                <p>
                    Цена:
                    <?php echo number_format($subtotal,2); ?>
                    EUR
                </p>

                <a href="remove_from_cart.php?id=<?php echo $id; ?>">
                    Премахни
                </a>

            </div>

        </div>

        <?php
    }

    ?>

    <h2>
        Обща сума:
        <?php echo number_format($total,2); ?>
        EUR
    </h2>

    <a href="checkout.php">
        Завърши поръчката
    </a>

    <?php

}
else {

    echo "<h2>Количката е празна.</h2>";
}

?>

<br><br>

<a href="index.php">
    ⬅ Продължи пазаруването
</a>

</div>

</body>
</html>