<?php
include "../../init.php";
$productsController = $container->make("productsController");
$productsController->index();

?>

<?php /*
 include '../structure/header.php'?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Produkte
                    <?php if($_GET){ echo " mit der Kategorie: {$_GET['category']}"; } ?>
                </h1>
            </div>
            <div class="col-3 mt-2">
                <div class="input-group">
                    <input type="text" class="form-control" maxlength="30" aria-label="Text input with segmented dropdown button">
                    <button type="button" class="btn btn-outline-secondary">Suchen</button>
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="index.php?">
                                Kein Filter
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>

                        <?php foreach ($categories as $row):?>
                            <li>
                                <a class="dropdown-item" href="index.php?category=<?php echo $row["name"] ?>">
                                    <?php echo $row["name"] ?>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3 ">
            <?php foreach ($products AS $row): ?>
                <div class="col">
                    <div class="card" style="width: auto">
                        <div class="card-header">
                            <h5 class="card-title text-center mb-0 pb-0"><?php echo $row->name ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src=".." alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <p class="card-text">
                                                <?php echo nl2br($row->description); ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            Stückpreis:
                                        </div>
                                        <div class="col">
                                            <?php echo $row->price ?> €
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-success btn-sm ms-2" href="detail.php?id=<?php echo $row->id ?>">Ansehen</a>
                                <a class="btn btn-success btn-sm ms-2 disabled">Admin bearbeiten</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include '../structure/footer.php'?>
 */?>