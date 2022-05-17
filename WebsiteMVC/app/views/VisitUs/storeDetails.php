<?php 
require APPROOT . '/views/includes/header.php'; 
$store = $data["store"];
$storePictures = explode(',',$store->storePictures);
?>

<html>

<head>
    <link href="/WebsiteMVC/public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2> <?php echo $store->storeName ?></h2><br> 
            <form action="" method='post'>          
                <!-- Display store image -->
                <div class="div_left">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            echo '
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/WebsiteMVC/public/img/Stores/'.$storePictures[0].'">
                            </div>
                            ';

                            unset($storePictures[0]);
                            foreach($storePictures as $storePicture){
                                echo '
                                <div class="carousel-item">
                                <img class="d-block w-100" src="/WebsiteMVC/public/img/Stores/'.$storePicture.'">
                                </div>
                                ';
                            }
                            ?>

                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            
                <!-- Display store description -->
                <div class="div_right">
                    <h4 class="box-title mt-3">Address</h4>
                    <p><?php echo $store->storeAddress ?></p>
                    
                    <h4 class="box-title mt-3">Telephone</h4>
                    <p><?php echo $store->storeTelephone ?></p>

                    <h4 class="box-title mt-3">Email</h4>
                    <p><?php echo $store->storeEmail ?></p>

                    <h4 class="box-title mt-3">Hours</h4>
                    <p><?php echo $store->storeHours ?></p>
                </div>
            <form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


<?php require APPROOT . '/views/includes/footer.php'; ?>