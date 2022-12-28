<?php

?>
<?= require_once __DIR__ . '/header.php'; ?>

    <link rel="icon" href="/php3-web-shopping-project/web-shopping/public/Images">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <body>

    <form action="/index.php?action=catalogue" method="post">
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Catalogue</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
<?php
/** @var \Projectmodule3\Entity\Product $product */
?>
<?php foreach ($product as $products): ?>
    <div class="col-md-4">

        <img class="card-img-top" src="/Images/<?=random_int(2, 8)?>.jpg"
             alt="Card image cap" width="50">
            <div class="card-body">
                <small class="text-muted" style="font-size: 10px">Product ID: #<?=$products->id()?></small><br>
                <medium class="text-muted" >Product Name: <?=$products->name()?></medium><br>
                <medium class="text-muted" >Description: <?=$products->description()?></medium><br>
                <medium class="text-muted" >Price: $<?=$products->price()?></medium><br>
            </div>
    </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <?=
                        "<a href='/index.php?action=addToCart&id={$products->id()}'>Add to cart</a>";
                        ?>
                        <br>
                        <br>


                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>


    </main>
    <br>
    <br>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
        </div>
    </footer>
    </body>
    </html>

<?= require_once __DIR__ . '/footer.php'; ?>