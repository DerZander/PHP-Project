<?php
include "../../init.php";
$productsController = $container->make("productsController");
$productsController->detail();

?>

<?php  /*
include "../../init.php"
$productsRepository = new \App\Products\ProductsRepository($pdo);
$product = $productsRepository->fetchProduct($_GET['id'])
?>
<?php include '../structure/header.php' ?>

<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Produkt: <?php echo $product->name ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php echo nl2br($product->description); ?>
    </div>
</div>
<div class="card text-dark bg-light m-3" >
    <div class="card-header">
        <h5 class="mb-0">Bewertungen</h5>
    </div>
    <div class="card-body">
        <form>
            <div class="d-flex justify-content-between">
                <div>nicht zu empfehlen</div>
                <div>zu empfehlen</div>
            </div>
            <input type="range" class="form-range" min="0" max="5" id="customRange2">

            <div class="input-group">
                <span class="input-group-text">With textarea</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2 float-end">Absenden</button>
        </form>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="card-body">
                <h5 class="card-title">Rating:  * * * * </h5>
                <p class="card-text">Bewertender Kommentar</p>
                <footer class="blockquote-footer">Username</footer>
            </div>
        </li>
    </ul>
</div>

<?php include '../structure/footer.php' */?>
