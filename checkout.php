<?php
session_start();

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Поръчката е приета</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="detail">

    <h1>✅ Благодарим за поръчката!</h1>

    <p>
        Вашата поръчка беше успешно приета.
    </p>

    <a href="index.php">
        Обратно към магазина
    </a>

</div>

</body>
</html>