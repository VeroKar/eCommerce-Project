<?php require APPROOT . '/views/includes/header.php'; ?>
<html>
<head>
</head>
<body>
    <div>
    <?php
        if($data != [] && isset($data['msg']))
        {
            echo '<div class="alert alert-success" role="alert">'.$data['msg'].'</div>';
        }
    ?>
    </div><br><br>

    <?php
    //Generate random quote on main page using API
        $api_url = 'https://api.quotable.io/random';
        $quote = json_decode(file_get_contents($api_url));
    ?>

    <div class="text-center">
        <div class="box" style="background: #fff; border: 2px solid rgba(0,0,0,0.1); font-family: 'Domine', serif; font-weight: bold;">
            <h5 class="content"><?php echo $quote->content;?></h5>
            <h6>- By <?php echo $quote->author;?></h6>
        </div>
    </div>

 <!-- Shop it all -->
<div class= "container">
    <br><h2>Shop it all</h2><br>
</div>

<!-- Filter the products -->
<div class= "container">
    <div class="input-group">
        <div class="dropdown filterDropdown mx-2">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">FILTERS</button>
    
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <form action="" method='post'>
                <!-- Div for creating a margin -->
                <div class="container">

                    <!-- Filter by materials -->
                    <h5>Materials</h5>
                                                                                             <!-- If the radio button has been clicked, then check == true -->
                    <input type="radio" id="radioGoldMaterial" name="materials" value="gold" <?php if (isset($_POST['materials']) && $_POST['materials'] == "gold") {echo "checked='true'";}?>>
                    <label for="radioGoldMaterial">Gold</label><br>
                    <input type="radio" id="radioPearlsMaterial" name="materials" value="pearls" <?php if (isset($_POST['materials']) && $_POST['materials'] == "pearls") {echo "checked='true'";}?>>
                    <label for="radioPearlsMaterial">Pearls</label><br>
                    <input type="radio" id="radioGemstonesMaterial" name="materials" value="gemstones" <?php if (isset($_POST['materials']) && $_POST['materials'] == "gemstones") {echo "checked='true'";}?>>
                    <label for="radioGemstonesMaterial">Gemstones</label>
                    <br><br>  

                    <!-- Filter by prices -->
                    <h5>Prices</h5>
                    <input type="radio" id="radioLowPrice" name="prices" value="under_100" <?php if (isset($_POST['prices']) && $_POST['prices'] == "under_100") {echo "checked='true'";}?>>
                    <label for="radioLowPrice">Under $100</label><br>
                    <input type="radio" id="radioMediumPrice" name="prices" value="between_100_200" <?php if (isset($_POST['prices']) && $_POST['prices'] == "between_100_200") {echo "checked='true'";}?>>
                    <label for="radioMediumPrice">$100-$200</label><br>
                    <input type="radio" id="radioHighPrice" name="prices" value="upper_200" <?php if (isset($_POST['prices']) && $_POST['prices'] == "upper_200") {echo "checked='true'";}?>>
                    <label for="radioHighPrice">$200+</label>
                    <br><br>  

                    <!-- Filter by type -->
                    <h5>Type</h5>
                    <input type="radio" id="radioEarringsType" name="type" value="earrings" <?php if (isset($_POST['type']) && $_POST['type'] == "earrings") {echo "checked='true'";}?>>
                    <label for="radioEarringsType">Earrings</label><br>
                    <input type="radio" id="radioRingsType" name="type" value="rings" <?php if (isset($_POST['type']) && $_POST['type'] == "rings") {echo "checked='true'";}?>>
                    <label for="radioRingsType">Rings</label><br>
                    <input type="radio" id="radioNecklacesType" name="type" value="necklaces" <?php if (isset($_POST['type']) && $_POST['type'] == "necklaces") {echo "checked='true'";}?>>
                    <label for="radioNecklacesType">Necklaces</label>
                    <br><br>  
                    <button type="submit" name="submitFilter" class="btn btn-dark"><small>APPLY FILTER(S)</small></button><br>
                    <a href="/WebsiteMVC/Home/index" class="link-dark">CLEAR ALL</a>
                </div>
                </form>
            </ul>

        </div>

    <!-- Sort by price products -->
        <div class="dropdown">
            <!-- <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">SORT BY</button> -->
            <a class="btn btn-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">SORT BY</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item"  href="/WebsiteMVC/Home/sortByAscendingPrice">Price: Low to High</a></li>
                <li><a class="dropdown-item"  href="/WebsiteMVC/Home/sortByDescendingPrice">Price: High to Low</a></li>
            </ul>
        </div>
</div>




<!-- Display all the products -->
<div class="container">
    <div class="row text-center py-5">
    <?php
        foreach($data["products"] as $product)
        {
            echo'<div class="col-md-3 col-sm-6 my-3 my-md-0">';
            echo'<form action="index.php" method="post">';  
                    echo'<div class="card shadow">
                        <a href="/WebsiteMVC/Home/details/'. $product->productId.'">
                        <img src="'.'http://localhost/WebsiteMVC/public/img/'.$product->pictureName.'" class="img-fluid card-img-top">
                        </a>
                        </div>';
                    echo'<div class="card-body">';
                        echo"<h5 class='card-title'> $product->productName</h5>";
                       
                        echo"<p class='card-text'>
                            $product->productShortDescription
                            </p>";
                        echo"<h5>
                            <small><s class='text-secondary'>$$product->previousPrice</s></small>
                            <span class='price'>$$product->actualPrice</span>
                            </h5>";
                    echo'</div>';
                echo'</form>';
            echo'</div>';
        }
        ?>
    </div>
</div>

</body>
</html>
<?php require APPROOT . '/views/includes/footer.php'; ?>