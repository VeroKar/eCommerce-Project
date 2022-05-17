<?php require APPROOT . '/views/includes/header.php'; 
?>
       <h1>Adding New Product</h1>
	
    

	<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameinput">productName</label>
        <input name="productName" type="text" class="form-control" id="productName" placeholder="Product Name">
    </div>
    <div class="form-group">
        <label for="textinput">productShortDescription</label>
        <input name="productShortDescription" type="text" class="form-control" id="productShortDescription" placeholder="Product Short Description">
    </div>

    <div class="form-group">
        <label for="textinput">productDescription</label>
        <input name="productDescription" type="text" class="form-control" id="productDescription" placeholder="Product Description">
    </div>

    <div class="form-group">
        <label for="textinput">productType</label>
        <input name="productType" type="text" class="form-control" id="productType" placeholder="Product Type">
    </div>

    <div class="form-group">
        <label for="textinput">previousPrice</label>
        <input name="previousPrice" type="text" class="form-control" id="previousPrice" placeholder="Previous Price">
    </div>

    <div class="form-group">
        <label for="textinput">actualPrice</label>
        <input name="actualPrice" type="text" class="form-control" id="actualPrice" placeholder="Actual Price">
    </div>

    <div class="form-group">
        <label for="textinput">material</label>
        <input name="material" type="text" class="form-control" id="material" placeholder="Material">
    </div>

    <div class="form-group">
        <label for="textinput">quantity</label>
        <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Quantity">
    </div>

    <div class="form-group">
        <label for="textinput">isGift(1 or 0)</label>
        <input name="isGift" type="text" class="form-control" id="isGift" placeholder="Is Gift">
    </div>

    <div class="form-group">
        <label for="textinput">pictureName</label>
        <input name="pictureName" type="text" class="form-control" id="pictureName" placeholder="Picture Name">
    </div>

    <button type="submit" name='addProductBtn' class="btn btn-primary">Add Form</button>
    </form>
    </table>
    
<?php require APPROOT . '/views/includes/footer.php'; ?>