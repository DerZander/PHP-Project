<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Warenkorb
                </h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Produkt</th>
                <th scope="col">Preis</th>
                <th scope="col">Stückzahl</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_COOKIE['cart'])){
                    foreach (unserialize($_COOKIE['cart']) AS $product):
                ?>
                    <tr>
                        <td><?php echo $product['product_name'] ?></td>
                        <td><?php echo $product['product_price'] ?> €</td>
                        <td><?php echo $product['amount'] ?></td>
                    </tr>
                <?php
                    endforeach;
                    }
                ?>
            </tbody>
            <tfoot>
                <tr class="table-active">
                    <td>Gesamt:</td>
                    <td><?php echo $total_price ?> €</td>
                    <td><?php echo $total_amount ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php if(isset($_COOKIE['cart'])):?>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <a class="btn btn-danger" href="cart-ejection">Warenkorb löschen</a>
            <a class="btn btn-success" href="cart-pay">zur Kasse</a>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>
