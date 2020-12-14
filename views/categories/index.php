<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Kategorien
                </h1>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3 ">
            <?php foreach ($categories AS $category): ?>
                <div class="col">
                    <div class="card" style="width: auto">
                        <div class="card-header">
                            <h5 class="card-title text-center mb-0 pb-0"><?php echo e($category['name']) ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="col-md-8">
                                <p class="card-text">
                                    <?php echo e(nl2br($category['description'])); ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-success btn-sm ms-2" href="index?category=<?php echo $category['name'] ?>">Produkte zu dieser Kategorie ansehen</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>