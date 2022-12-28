
<?php

?>

<?= require_once __DIR__ . '/header.php'; ?>

<body>

<h1>Manage Products</h1>

<form action="/index.php?action=create-product" method="post">
    <label>Product Name:<br>
        <input name="name" placeholder="Name" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Description:<br>
        <input name="description" placeholder="Description" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Price:<br>
        <input name="price" placeholder="Price" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Quantity:<br>
        <input name="quantity" placeholder="Quantity" type="number" required/>
    </label>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

<hr />

<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price in $  </th>
        <th>Product Quantity</th>
        <th>Delete Option</th>
        <th>Update Option</th>
    </tr>

    <?php
    /** @var \Projectmodule3\Entity\Product $product */
    foreach ($product as $products):
        ?>
        <tr>
            <td><?=$products->name() ?><br></td>
            <td><?=$products->description() ?><br></td>
            <td><?=$products->price() ?><br></td>
            <td><?=$products->quantity() ?><br></td>
            <td>
               <?=
                "<a href='/index.php?action=delete&id={$products->id()}'>Delete</a>";
                ?>
            </td>
            <td>
               <?=
               "<a href='/index.php?action=update&id={$products->id()}'>Update</a>";
               ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>



</body>
<?= require_once __DIR__ . '/footer.php'; ?>

