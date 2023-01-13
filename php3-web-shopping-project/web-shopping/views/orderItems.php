<?php


use Projectmodule3\Entity\OrderItems;
use Projectmodule3\Factory\OrderItemsRepositoryFactory;

// get from id to be implemented
require_once __DIR__ . '/header.php';
$repository = OrderItemsRepositoryFactory::makeOrderItems();
$orderItems = $repository->findAllOrderItems()// pass id here);

?>

<body>

<div style="text-align: center;"><h1>Orders History</h1></div>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    /* setting the text-align property to center*/
    td {
        padding: 5px;
        text-align: center;
    }
</style>

<table border="1">
    <tr>
        <th>Order ID</th>
        <th>Product ID</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
    </tr>

    <?php
    /** @var OrderItems $orderItems */
    foreach ($orderItems as $item):
        ?>
        <tr>
            <td><?=$item->orderId() ?><br></td>
            <td><?=$item->productId() ?><br></td>
            <td>$<?=$item->price() ?><br></td>
            <td><?=$item->quantity() ?><br></td>
        </tr>
    <?php endforeach ?>
</table>



</body>
<?php
require_once __DIR__ . '/footer.php';
?>
