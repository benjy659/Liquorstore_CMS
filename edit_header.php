<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
    exit();
}

?>

<header id="header">
    <div class="nav-wrapper">
        <img src="images/liquor-store.jpg" alt="Company Logo">
        <div class="grad-bar"></div>
            <nav class="navbar">
                <div class="hero">
                    <?php if (isset($_SESSION['username'])): ?>
                            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
                        <?php endif; ?>
                </div>
                <ul class="nav no-search">
                <li class="nav-item"><a href="admin_dashboard.php">Back to Admin</a></li>
                <li class="nav-item"><a href="liquorhomepage.php">Home</a></li>
                <li class="nav-item"><a href="About.php">About</a></li>
                <li class="nav-item"><a href="#">ContactUs</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item" id= "log-out"><a href="logout.php">Logout</a></li>
                <?php endif; ?>
                <input type="search" name="search-input"  class="search-input" placeholder="Search Brands">
                <button type="submit" class="search-button"><i class="fas fa-search">Search</i></button>
                <h1>Benjamin Liquor Store</h1>
                </ul>
            </nav>
        </div>
    </div>
</header>