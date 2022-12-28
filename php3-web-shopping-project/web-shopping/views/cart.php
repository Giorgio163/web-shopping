<?php

$products = $_SESSION['session_cart'];
?>

<?= require_once __DIR__ . '/header.php'; ?>



<body>

<h1>Cart</h1>

<form action="/index.php?action=checkout" method="post">

    <hr />

    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price in $  </th>
            <th>Product Quantity</th>
        </tr>
        <?php
        foreach ($products as $product):
            ?>
            <tr>
                <td><?=$product->name() ?><br></td>
                <td><?=$product->description()?><br></td>
                <td><?=$product->price()?><br></td>
                <td><?=$product->quantity() ?><br></td>
            </tr>
        <?php endforeach ?>
    </table>
    <button type="submit">Checkout</button>


</body>
<?= require_once __DIR__ . '/footer.php'; ?>
