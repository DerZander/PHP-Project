<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    <?php echo $product->name ?>
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
            <div class="input-group">
                <span class="input-group-text">Bewertung</span>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2 float-end">Absenden</button>
        </form>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="card-body">
                <p class="card-text">Bewertender Kommentar</p>
                <footer class="blockquote-footer">Username</footer>
            </div>
        </li>
    </ul>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>