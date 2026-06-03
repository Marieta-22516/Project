<?php
session_start();
include "db.php";

$id = (int)$_GET['id'];

$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $book['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="detail">

    <div class="book-detail">

        <img src="images/<?php echo $book['image']; ?>">

        <div class="book-info">

            <h1><?php echo $book['title']; ?></h1>

            <h3><?php echo $book['author']; ?></h3>

            <p><?php echo $book['description']; ?></p>

            <h2><?php echo $book['price']; ?> EUR</h2>

            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                <button type="submit">
                    Добави в количката
                </button>
            </form>

            <br>

            <a href="index.php">⬅ Назад</a>

        </div>

    </div>

</div>

</body>
</html>