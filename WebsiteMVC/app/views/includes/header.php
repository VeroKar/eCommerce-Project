<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- for theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sketchy/bootstrap.min.css" integrity="sha384-NCwXci5f5ZqlDw+m7FwZSAwboa0svoPPylIW3Nf+GBDsyVum+yArYnaFLE9UDzLd" crossorigin="anonymous">
    <!-- for the text style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Domine&family=EB+Garamond:ital,wght@1,400;1,500&family=Open+Sans:wght@300&family=Square+Peg&display=swap" rel="stylesheet">
    <!-- for the search -->
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>

<!-- Banner for 15% off on first order -->
<?php
if (!isLoggedIn())
{
echo '<div class="alert alert-dark" style="text-align: center">
    <a href="/WebsiteMVC/Login/create/" style="color:black; font-weight: bold;">SIGN UP</a>
    AND SAVE 15% ON YOUR FIRST ORDER !
</div>';
}
?>


<body>
<div class="menu">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
               
                <li class="nav-item">
                    <div class="main-nav-link">  <a class="nav-link" href="/WebsiteMVC/Home">ONYX</a></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebsiteMVC/Home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebsiteMVC/Gift">Gifts</a>
                </li>

                <li class="nav-item">
                        <form class="d-flex" method="POST" action="/WebsiteMVC/Search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search_form" name="search_form">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebsiteMVC/VisitUs">Visit Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebsiteMVC/FAQ">FAQs</a>
                </li>
                </li>                
                    <?php
                    if(getAdminAccess()) {
                        echo '<li class="nav-item"><a class="nav-link" href="/WebsiteMVC/Owner">Admin</a></li>';
                    }
                    ?>                    
                </li>
            </ul>

            <!-- Add to cart icon -->
            <?php
                if (isLoggedIn()) {
                    echo "<ul class='nav navbar-nav navbar-right'>";
                    echo "<li class='nav-item'>";
                    echo "<button class='btn btn-rounded my-2 my-lg-0' action='' method='post' name='cartButton'>
                            <a class='nav-link' href='/WebsiteMVC/Cart'>
                                <i class='fa fa-shopping-cart my-2 my-sm-0'></i>
                            </a>
                        </button>";
                    echo "</li>";
                    echo "</ul>";
                }
            ?>
                
            <ul class="nav navbar-nav navbar-right">
            <?php
            if (isLoggedIn()) {
                echo '<li class="nav-item"><a class="nav-link" href="/WebsiteMVC/Profile"><i class="fa fa-user"></i> Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/WebsiteMVC/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout  ' . $_SESSION['user_username'] . '</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" href="/WebsiteMVC/Login/create"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="/WebsiteMVC/Login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>';
            }
            ?>
        </ul>
        </div>
    </div>
</nav>
</div>