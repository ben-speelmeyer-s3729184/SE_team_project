<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link " href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Tours</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="">Create New Tour</a>
                <a class="dropdown-item" href="">Edit Tours</a>
                <a class="dropdown-item" href="">View and Delete Tours</a>
            </div>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Locations</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="addNewLocations.php">Add New Location</a>
                <a class="dropdown-item" href="editExistingLocations.php">Edit Location</a>
                <a class="dropdown-item" href="viewDeleteLocation.php">View and Delete Location</a>
            </div>
        </li>
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">User accounts</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="createUser.php">Add New User</a>
                <a class="dropdown-item" href="editExistingUser.php">Edit Users</a>
                <a class="dropdown-item" href="viewDeleteUser.php">View and Delete Users</a>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link  " href="logout.php">Logout</a>
        </li>
        <li class="nav-item active mr-auto">
            <a class="nav-link" href="#">Logged in as: <?php echo $_SESSION['login_user']?></a>
        </li>        
    </ul>
</nav>