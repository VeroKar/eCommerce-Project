<?php require APPROOT . '/views/includes/header.php'; ?>

<html>

<head>
</head>

<body>
    
 <!-- Store Locations -->
    <div class= "container">
        <br><h2>Store Locations</h2><br>
    </div>

 <!-- Display all the products -->
    <div class="container">
        <table  class="table table-bordered">
            <?php
                foreach($data["stores"] as $store){
                    $storePictures = explode(',',$store->storePictures);

                    echo"<tr>";
                    echo '<td>
                    <div class="d-flex align-items-center">
                    <img src="'.URLROOT.'/img/Stores/'.$storePictures[0].'" class="rounded mx-auto d-block" width="400" height="200">
                    </div>
                    </td>';
                    echo"<td>$store->storeName</td>";
                    echo"<td>$store->storeAddress</td>";
                    echo"<td>
                    <a href='/WebsiteMVC/VisitUs/storeDetails/$store->storeID'> Details</a>
                    </td>";
                    echo"</tr>";
                }
            ?>
        </table>
    </div>


</body>
</html>

<?php require APPROOT . '/views/includes/footer.php'; ?>