<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Bestellung: <?php echo $cart['id'] ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Produkt</th>
                <th scope="col">Stückzahl</th>
                <th scope="col">Preis</th>

            </tr>
            </thead>
            <tbody>
                <?php foreach($products AS $product): ?>
                    <tr>
                        <td><?php echo $product['product_name'] ?></td>
                        <td><?php echo $product['amount'] ?></td>
                        <td><?php echo $product['product_price'] ?> €</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-active">
                    <td>Gesamt:</td>
                    <td><?php echo $cart['total_amount'] ?></td>
                    <td><?php echo $cart['total_price'] ?> €</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>
