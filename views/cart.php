<?php

$products = $_SESSION['session_cart'];
require_once __DIR__ . '/header.php';
?>

<body>

<div style="text-align: center;"><h1>Cart</h1></div>
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

<form action="/index.php?action=checkout" method="post">

    <hr />

    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
        </tr>
        <?php
        foreach ($products as  $product):
            ?>
            <tr>
                <td><?=$product->id ?><br></td>
                <td><?=$product->name ?><br></td>
                <td><?=$product->description?><br></td>
                <td> $<?=$product->price?><br></td>
                <td><?=$product->quantity?><br></td>
                <td>
                    <?=
                    "<a href='/index.php?action=updateCart&id={$product->id}&quantity={$product->quantity}'>Update</a>";
                    ?>
                </td>
                <td>
                    <?=
                    "<a href='/index.php?action=deleteFromCart&id={$product->id}'>Delete</a>";
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
    <br>
    <?php if (count($products) === 0) {
        echo "<b><i>Cart is empty cannot proceed to checkout, add a product and try again!</i></b>";
    } else {
        echo '<button type="submit" class="btn btn-info">Proceed To Checkout</button>';
    }?>


</body>
<?php
require_once __DIR__ . '/footer.php';
?>
