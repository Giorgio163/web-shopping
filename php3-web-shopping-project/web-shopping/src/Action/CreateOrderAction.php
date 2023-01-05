<?php

namespace Projectmodule3\Action;

use Projectmodule3\Entity\Order;
use Projectmodule3\Entity\OrdersItems;
use Projectmodule3\Factory\OrderRepositoryFactory;
session_name('session_cart');
session_start();

class CreateOrderAction
{
    public function handle()
    {
        $orders = new Order(
            filter_input(INPUT_POST, 'total'),
            filter_input(INPUT_POST, 'dateTime')
        );

        $repository = OrderRepositoryFactory::makeOrder();
        $repository->storeOrder($orders);
        /*
                $sql = <<<SQL
            SELECT * FROM students JOIN classrooms ON students.classroom_id=classrooms.classroom_id
            ORDER BY classrooms.classroom_id ASC
            SQL;

                $mysqli = connect();
                $result = $mysqli->query($sql);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
        */
        session_destroy();
        require_once __DIR__ . '/../../views/orders.php';
    }
}