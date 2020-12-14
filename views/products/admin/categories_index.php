<?php include __DIR__ . "/../../layouts/header.php" ?>
    <div class="card text-dark bg-light m-3 ">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Kategorien
                    </h1>
                </div>
                <div class="col mt-2">
                    <div class="d-flex justify-content-end ">
                        <a class="btn btn-success" href="categories-create" >neues Kategorie</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="card-body table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Beschreibung</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($categories AS $category): ?>
                <tr>
                    <td><?php echo $category['id']?></td>
                    <td><?php echo $category['name']?></td>
                    <td><?php echo $category['description']?></td>
                    <td class="col-2">
                        <a class="btn btn-warning" href="categories-edit?id=<?php echo $category['id']?>">Bearbeiten</a>
                        <a class="btn btn-danger" href="categories-delete?id=<?php echo $category['id']?>">Löschen</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php include __DIR__ . "/../../layouts/footer.php" ?>