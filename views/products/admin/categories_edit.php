<?php /** @noinspection PhpUndefinedVariableInspection */
include __DIR__ . "/../../layouts/header.php"?>
    <div class="card text-dark bg-light m-3 ">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Bearbeiten: <?php echo e($entry['name']) ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="categories-edit?id=<?php echo e($entry['id']) ?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" name="name" value="<?php echo e($entry['name']) ?>" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Beschreibung</span>
                    <textarea type="text" class="form-control" name="description" aria-label="Username" aria-describedby="basic-addon1"><?php echo e($entry['description']) ?></textarea>
                </div>
                <input class="btn btn-success" type="submit" value="Kategorie speichern">
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include __DIR__ . "/../../layouts/footer.php"?>