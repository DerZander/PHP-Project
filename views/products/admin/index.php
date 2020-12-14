<?php include __DIR__ . "/../../layouts/header.php" ?>
    <div class="card text-dark bg-light m-3 ">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Produkte
                    </h1>
                </div>
                <div class="col mt-2">
                    <div class="d-flex justify-content-end ">
                        <a class="btn btn-success" href="products-create" >neues Produkt</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="card-body table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Kategorie</th>
                <th scope="col">Beschreibung</th>
                <th scope="col">Preis</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products AS $product): ?>
                <tr>
                    <td><?php echo $product['id']?></td>
                    <td><?php echo $product['name']?></td>
                    <td><?php echo $product['category_id']?></td>
                    <td><?php echo $product['description']?></td>
                    <td><?php echo $product['price']?></td>
                    <td class="col-2">
                        <a class="btn btn-warning" href="products-edit?id=<?php echo $product['id']?>">Bearbeiten</a>
                        <a class="btn btn-danger" href="products-delete?id=<?php echo $product['id']?>">Löschen</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<?php include __DIR__ . "/../../layouts/footer.php" ?>