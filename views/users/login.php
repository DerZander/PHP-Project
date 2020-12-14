<?php require __DIR__ . "/../layouts/header.php"?>
<?php if(!empty($error)): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif;?>
<div class="d-flex justify-content-evenly">
    <div class="card text-center m-3">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Sie sind neu hier?</h5>
            <p class="card-text">Dann melden Sie sich doch rasch an, <br>
                um all unsere Produkte sehen zu können?</p>
            <form method="POST" action="register">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" name="username" placeholder="Username" >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" name="email" placeholder="max.muster@email.com">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" name="password" placeholder="Passwort">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card text-center m-3">
        <div class="card-header">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            <form method="POST" method="login">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Einloggen</button>
            </form>
        </div>
    </div>



</div>
<?php require __DIR__ . "/../layouts/footer.php"?>