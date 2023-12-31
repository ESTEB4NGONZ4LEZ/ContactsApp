<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="#">
            <img class="logo mr-2" src="/contacts_app_poo/view/img/logo.png" />
            ContactsApp
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav">
                    <?php  if(isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts_app_poo/view/pages/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts_app_poo/view/pages/addContact.php">Add Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts_app_poo/controllers/logout.php">Log Out</a>
                        </li>
                    <?php  else: ?>    
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts_app_poo/view/pages/register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts_app_poo/view/pages/login.php">Login</a>
                        </li>
                    <?php endif ?>
                </ul>
                <div class="p-2">
                    <?php  if(isset($_SESSION['user'])): ?>
                        <?=  $_SESSION['user']['email'] ?>
                    <?php  endif ?>
                </div>
            </div>
        </div>
        </div>
    </nav>