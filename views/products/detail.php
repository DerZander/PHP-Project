<?php /** @noinspection PhpUndefinedVariableInspection */
include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    <?php echo e($product['name']) ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php echo nl2br(e($product['description'])); ?>
    </div>
    <div class="card-footer">
        <h5 class="card-title">Meine Bewertung</h5>
        <form method="post" action="detail?id=<?php echo e($product['id']);?>">
            <div class="row">
                <div class="col">
                    <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
                    <input type="range" name="stars" class="form-range" min="0" max="5" id="stars">
                    <div class="d-flex justify-content-between">
                        <div>unzufrieden</div>
                        <div>neutral</div>
                        <div>sehr zufrieden</div>
                    </div>
                </div>
                <div class="col-1">
                    <input type="submit" value="Absenden" class="btn btn-primary mt-2 float-end">
                </div>
            </div>
        </form>
    </div>

</div>




<div class="card text-dark bg-light m-3" >
    <div class="card-header">
        <h5 class="mb-0">Bewertungen</h5>
    </div>
    <div class="card-body">
        <div class="d-flex flex-wrap">
            <?php foreach ($ratings AS $rating):?>
                <div class="card text-center m-2">
                    <div class="card-header">
                        Bewertung vom: <?php echo nl2br(e($rating['date'])) ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo nl2br(e($rating['rating'])) ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?php for($x=0;$x<=$rating['stars'];$x++):?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        <?php endfor; ?>
                        <?php for($x=5;$x>$rating['stars'];$x--):?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                            </svg>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>


<?php include __DIR__ . "/../layouts/footer.php"?>