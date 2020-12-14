<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Der Onlineshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <?php if(!empty($_SESSION['user_id'])): ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="categories">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories">Kategorien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products">Produkte</a>
                    </li>
                    <?php if(isset($_COOKIE['cart'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart">Warenkorb</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown">
                        <a class="nav-link btn btn-secondary btn-sm dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hallo, <?php echo e($_SESSION['user_name']) ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><h6 class="dropdown-header">Konto</h6></li>
                                <li><a class="dropdown-item" href="user-edit">Bearbeiten</a></li>
                                <div class="dropdown-divider"></div>
                                <li><h6 class="dropdown-header">Archiv</h6></li>
                                <li><a class="dropdown-item" href="cart-orders">Bestellungen</a></li>
                                <div class="dropdown-divider"></div>
                            <?php if($_SESSION['user_superuser']): ?>
                                <li><h6 class="dropdown-header">Adminbereich</h6></li>
                                <li><a class="dropdown-item" href="products-admin">Produkte</a></li>
                                <li><a class="dropdown-item" href="categories-admin">Kategorien</a></li>
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
