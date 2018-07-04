<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-light" >Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="../user/create.php">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../user/list.php">List</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="../category/create.php">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../category/list.php">List</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        News
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="../news/create.php">Create</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../news/list.php">List</a>
                    </div>
                </div>
            </li>
        </ul>
        <form method="POST" action="../process/loginLogout.php" class="form-inline">
            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="logoutBtn"> Logout </button>
        </form>
    </div>
</nav>