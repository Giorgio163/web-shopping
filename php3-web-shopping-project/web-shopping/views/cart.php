<?php

$products = $_SESSION['session_cart'];

?>

<?= require_once __DIR__ . '/header.php'; ?>



<body>

<h1>Cart</h1>

<form action="/index.php?action=updateCart" method="post">

    <hr />

    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price in $  </th>
            <th>Product Quantity</th>
        </tr>
        <?php
        foreach ($products as  $product):
            var_dump($product);
            ?>
            <tr>
                <td><?=$product->id() ?><br></td>
                <td><?=$product->name() ?><br></td>
                <td><?=$product->description()?><br></td>
                <td><?=$product->price()?><br></td>
                <td><select class="form-select" aria-label="Default select example" name="quantity" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select></td>
                <td>
                    <?=
                    "<a href='/index.php?action=updateCart&id={$product->id()}'>Update</a>";
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
    <br>
    <button type="submit" class="btn btn-info">Checkout</button>


</body>
<?= require_once __DIR__ . '/footer.php'; ?>
