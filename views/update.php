<?php

use Projectmodule3\Entity\Product;

require_once __DIR__ . '/header.php';
?>

<body>

<h1>Update Products</h1>

<?php
/** @var Product $product */
?>

<form action="/index.php?action=update" method="post">
    <label>Product ID:<br>
        <input name="id" value="<?=$product->id() ?>" type="text" readonly/>
    </label>
    <br>
    <br>

    <label>Product Name:<br>
        <input name="name" value="<?=$product->name() ?>" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Description:<br>
        <input name="description" value="<?=$product->description() ?>" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Price:<br>
        <input name="price" value="<?=$product->price() ?>" type="text" required/>
    </label>
    <br>
    <br>

    <label>Product Quantity:<br>
        <input name="quantity" value="<?=$product->quantity() ?>" type="number" required/>
    </label>
    <br>
    <br>
    <button type="submit" class="btn btn-info">Update Product</button>
</form>




</body>
<?php
require_once __DIR__ . '/footer.php';
?>


