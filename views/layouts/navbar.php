<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Der Onlineshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <?php if(!empty($_SESSION['login'])): ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index">Produkte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Warenkorb</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown">
                        <a class="nav-link btn btn-secondary btn-sm dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hallo, <?php echo e($_SESSION['login']) ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if($_SESSION['superuser']): ?>
                                <li><a class="dropdown-item" href="/admin">Adminseite</a></li>
                                <div class="dropdown-divider"></div>
                            <?php endif;?>
                            <li><a class="dropdown-item" href="logout">Abmelden</a></li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link disabled">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Produkte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Warenkorb</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="nav-item dropdown">
                        <a class="btn btn-success btn-sm" href="login" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Zum Login
                        </a>
                    </div>
                </span>
            <?php endif; ?>
        </div>
    </div>
</nav>
