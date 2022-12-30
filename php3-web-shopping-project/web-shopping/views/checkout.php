<?php

$products = $_SESSION['session_cart'];
require_once __DIR__ . '/header.php';
foreach ($products as $product){
  $prices[] = $product->price * $product->quantity;
    $total = array_sum($prices) ;
    $quantity = $product->quantity + $product->quantity;
}

?>

<body xmlns="http://www.w3.org/1999/html">

<div style="text-align: center;"><h1>Checkout</h1></div>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        padding: 5px;
        text-align: center;
    }
</style>

<form action="/index.php?action=updateCart" method="post">

    <hr />

    <table border="1">
        <tr>
            <th>Product name</th>
            <th>Total quantity</th>
            <th>Product Total</th>
        </tr>
        <?php
        foreach ($products as  $product):
        ?>
            <tr>
                <td><?= $product->name ?></td>
                <td><?= $product->quantity ?></td>
                <td>$<?= $product->quantity * $product->price  ?></td>
                <?php endforeach ?>
            </tr>
            <tr>
                <td></td>
                <td><input type="datetime-local" name="dateTime" required><br></td>
                <td> <b>Total Order: $<?=$total?></b><br></td>
            </tr>
    </table>
    <br>
    <br>
    <button type="submit" class="btn btn-info">Checkout</button>


</body>
<?php
require_once __DIR__ . '/footer.php';
?>
