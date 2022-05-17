<?php require APPROOT . '/views/includes/header.php'; ?>

<html>

<head>
</head>

<body>

    <!-- Search Results -->
    <div class= "container">
            <br><h2>Search Results</h2><br>
    </div>

    <!-- Display the search results -->
<?php

    if(array_key_exists('msg', $data)){
        echo '
        <div class="container">
            <div class="alert alert-danger" role="alert">'.
                $data['msg'].'
            </div>
        </div>    
        ';
    }
    else{
        echo '
        <div class="container">
            <div class="row text-center py-5">';

                foreach($data["searchResult"] as $product)
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

            echo'</div>';
        echo'</div>';

    }
?>

</body>
</html>

<?php require APPROOT . '/views/includes/footer.php'; ?>