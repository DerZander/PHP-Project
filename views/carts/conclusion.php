<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <?php if($success): ?>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Vielen Dank für deinen Einkauf
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Deine Bestellung ist mit beigefügter Rechnung unterwegs zu dir.</h5>
            <p class="card-text">Bei Interesse kannst du bereits gekaufte sowie noch nicht gekaufte Produkte bewerten.</p>
            <a href="products" class="btn btn-primary">zu allen Produkten</a>
        </div>
    <?php else: ?>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Kauf abgebrochen
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Leider fehlen dir noch ein paar Angaben.</h5>
            <p class="card-text">Vervollständige diese in deinem Konto.</p>
            <a href="user-edit" class="btn btn-primary">zu deinen Daten</a>
        </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>
