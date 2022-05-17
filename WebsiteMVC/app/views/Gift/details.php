<?php require APPROOT . '/views/includes/header.php'; 
$name= $data["products"]->pictureName;?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="container productName">
                <h2> <?php echo $data["products"]->productName ?></h2><br>
            </div>           
            <div class="row">
                <!-- Display image -->
                <div class="col-lg-4 col-md-5 col-sm-6"><br>
                    <div class="white-box text-center"><img src="http://localhost/WebsiteMVC/public/img/<?php echo($name)?>" class="img-responsive"></div>
                </div>               
                <!-- Display product description -->
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h3 class="box-title mt-3">Product description</h3>
                    <p><?php echo $data["products"]->productDescription ?></p>
                    <!-- Personalyze jewelery -->
                    <input type="jewleryInputText" class="form-control" id="jewleryInputText" placeholder="Personalize your jewlery!">
                    <!-- Product actual price -->
                    <h2 class="mt-4">
                        $<?php echo $data["products"]->actualPrice?>
                        <!-- Product previous price -->
                        <small><s class='text-secondary'>$<?php echo $data["products"]->previousPrice ?></s></small>
                    </h2>
                    <!-- Buy button -->
                    <button class="btn btn-dark btn-rounded" name="addToCartButton">Add to cart</button>
                    <!-- Additional information -->
                    <h3 class="box-title mt-4">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i><?php echo $data["products"]->productShortDescription?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>