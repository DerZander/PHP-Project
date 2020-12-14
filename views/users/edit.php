<?php require __DIR__ . "/../layouts/header.php"?>
<?php if(!empty($message)): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $message?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif;?>
<div class="card text-dark bg-light m-3 ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h1 class="m-0">
                    Das ist dein Profil: <?php echo e($entry['username']) ?>
                </h1>
            </div>
        </div>
    </div>

    <form method="post" action="user-edit">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5 class="card-title">Ihre Stammdaten</h5>
                <div class="input-group mb-3">
                    <span class="input-group-text">Vor- und Nachname</span>
                    <input type="text" class="form-control" name="first_name" value="<?php echo e($entry['first_name']) ?>">
                    <input type="text" class="form-control" name="last_name" value="<?php echo e($entry['last_name']) ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Emailadresse</span>
                    <input type="text" class="form-control" name="email" value="<?php echo e($entry['email']) ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Geburtsdatum</span>
                    <input type="date" class="form-control" name="birthday" value="<?php echo e($entry['birthday']) ?>">
                </div>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Ihre Adresse</h5>
                <div class="input-group mb-3">
                    <span class="input-group-text">Straße und Hausnummer</span>
                    <input type="text" class="form-control" name="street" value="<?php echo e($entry['street']) ?>">
                    <input type="text" class="form-control" name="housenumber" value="<?php echo e($entry['housenumber']) ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">PLZ und Ort</span>
                    <input type="text" class="form-control" name="postcode" value="<?php echo e($entry['postcode']) ?>">
                    <input type="text" class="form-control" name="city" value="<?php echo e($entry['city']) ?>">
                </div>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Passwort ändern</h5>
                <div class="input-group mb-3">
                    <span class="input-group-text">altes Password</span>
                    <input type="password" class="form-control" name="old_password">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">neues Password</span>
                    <input type="password" class="form-control" name="new_password">
                </div>
            </li>
            <li class="list-group-item">
                <h5 class="card-title">Abspeichern</h5>
                <p>Alle von Ihnen eingegebenen Daten werden nicht an Dritte weiter gegeben.</p>
                <input type="submit" class="btn btn-success" value="Speichern">
            </li>
        </ul>
    </form>
</div>
<?php require __DIR__ . "/../layouts/footer.php"?>
