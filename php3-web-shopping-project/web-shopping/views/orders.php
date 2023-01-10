<?php

use Projectmodule3\Factory\OrderRepositoryFactory;

require_once __DIR__ . '/header.php';
$repository = OrderRepositoryFactory::makeOrder();
$orders = $repository->findAllOrders();
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
        <th>Order Total</th>
        <th>Order Checkout Date</th>

    </tr>

    <?php
    /** @var \Projectmodule3\Entity\Order $orders */
    foreach ($orders as $order):
        ?>
        <tr>
            <td><?=$order->id() ?><br></td>
            <td>$<?=$order->total() ?><br></td>
            <td><?=$order->completedAt() ?><br></td>
            <td>
                <?=
                "<a href='/index.php?action=updateCart&id={$order->id()}'>Order Details</a>";
                ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>



</body>
<?php
require_once __DIR__ . '/footer.php';
?>
