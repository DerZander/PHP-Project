<?php /** @noinspection PhpUndefinedVariableInspection */
include __DIR__ . "/../../layouts/header.php"?>
    <div class="card text-dark bg-light m-3 ">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1 class="m-0">
                        Neues Produkt erstellen
                    </h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="products-create">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" name="name"  aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Beschreibung</span>
                    <textarea type="text" class="form-control" name="description" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Price</span>
                    <input type="text" class="form-control" name="price" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Kategorie</label>
                    <select class="form-select" name="category" id="inputGroupSelect01">
                        <option selected>Wähle aus...</option>
                        <?php foreach($categories AS $category):?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <input class="btn btn-success" type="submit" value="Produkt speichern">
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include __DIR__ . "/../../layouts/footer.php"?>