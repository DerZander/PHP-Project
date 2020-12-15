<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <?php if(empty($carts)): ?>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Heyhooo <?php echo e($_SESSION['user_name']) ?>, Leider hast du noch nichts bestellt
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Schau dir unsere Kategorien und Produkte doch mal an.</h5>
            <p class="card-text">Bei interesse füge Sie deinem Warenkorb hinzu und bestellt diesen anschließen auf Rechnung.</p>
            <a href="categories" class="btn btn-primary">zu allen Kategorien</a>
            <a href="products" class="btn btn-primary">zu allen Produkten</a>
        </div>
    <?php else: ?>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Bestellungen
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Bestellnummer</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Menge</th>
                    <th scope="col">Preis</th>
                    <th scope="col-1"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($carts AS $cart): ?>
                    <tr>
                        <td><?php echo $cart['id'] ?></td>
                        <td><?php echo $cart['paid'] ?></td>
                        <td><?php echo $cart['total_amount'] ?></td>
                        <td><?php echo $cart['total_price'] ?> €</td>
                        <td class="col-1"><a class="btn btn-secondary" href="cart-order?id=<?php echo $cart['id'] ?>">ansehen</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . "/../layouts/footer.php"?>
