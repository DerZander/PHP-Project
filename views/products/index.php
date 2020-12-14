<?php include __DIR__ . "/../layouts/header.php"?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Produkte
                    <?php //ToDO:Category filter ?>
                    <?php if($_GET){ echo " mit der Kategorie: {$_GET['category']}"; } ?>
                </h1>
            </div>
            <div class="col mt-2">
                <div class="d-flex justify-content-end ">
                    <form class="row" method="GET" action="index">
                        <div class="col-auto">
                            <label for="search" class="visually-hidden">Suche</label>
                            <input type="text" class="form-control" id="search" placeholder="Suche">
                        </div>
                        <div class="col-auto">
                            <div class="btn-group ">
                                <button type="submit" class="btn btn-primary">Suchen</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    <li><a class="dropdown-item" href="#">Kein Filter</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <?php foreach ($categories as $category):?>
                                        <li><a class="dropdown-item" href="?category=<?php echo $category['name'] ?>"><?php echo $category['name'] ?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($products AS $row): ?>
                <div class="col">
                    <div class="card" style="width: auto">
                        <div class="card-header">
                            <h5 class="card-title text-center mb-0 pb-0"><?php echo e($row['name']) ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="card-text">
                                        <?php echo e(nl2br($row['description'])); ?>
                                    </p>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            Stückpreis:
                                        </div>
                                        <div class="col">
                                            <?php echo e($row['price']) ?> €
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-success btn-sm ms-2" href="detail?id=<?php echo e($row['id']) ?>">Ansehen</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layouts/footer.php"?>