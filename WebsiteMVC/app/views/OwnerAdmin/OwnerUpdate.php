<?php require APPROOT . '/views/includes/header.php'; 
?>
       <h1>Updating Product</h1>
	
    

	<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameinput">productName</label>
        <input name="productName" type="text" class="form-control" id="productName" placeholder="Product Name" value = "<?php echo $data->productName?>">
    </div>
    <div class="form-group">
        <label for="textinput">productShortDescription</label>
        <input name="productShortDescription" type="text" class="form-control" id="productShortDescription" placeholder="Product Short Description" value = "<?php echo $data->productShortDescription?>">
    </div>

    <div class="form-group">
        <label for="textinput">productDescription</label>
        <input name="productDescription" type="text" class="form-control" id="productDescription" placeholder="Product Description" value = "<?php echo $data->productDescription?>">
    </div>

    <div class="form-group">
        <label for="textinput">productType</label>
        <input name="productType" type="text" class="form-control" id="productType" placeholder="Product Type" value = "<?php echo $data->productType?>">
    </div>

    <div class="form-group">
        <label for="textinput">previousPrice</label>
        <input name="previousPrice" type="text" class="form-control" id="previousPrice" placeholder="Previous Price" value = "<?php echo $data->previousPrice?>">
    </div>

    <div class="form-group">
        <label for="textinput">actualPrice</label>
        <input name="actualPrice" type="text" class="form-control" id="actualPrice" placeholder="Actual Price" value = "<?php echo $data->actualPrice?>">
    </div>

    <div class="form-group">
        <label for="textinput">material</label>
        <input name="material" type="text" class="form-control" id="material" placeholder="Material" value = "<?php echo $data->material?>">
    </div>

    <div class="form-group">
        <label for="textinput">quantity</label>
        <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Quantity" value = "<?php echo $data->quantity?>">
    </div>

    <div class="form-group">
        <label for="textinput">isGift(1 or 0)</label>
        <input name="isGift" type="text" class="form-control" id="isGift" placeholder="Is Gift" value = "<?php echo $data->isGift?>">
    </div>

    <div class="form-group">
        <label for="textinput">pictureName</label>
        <input name="pictureName" type="text" class="form-control" id="pictureName" placeholder="Picture Name" value = "<?php echo $data->pictureName?>">
    </div>

    <button type="submit" name='updateProductBtn' class="btn btn-primary">Update Product</button>
    </form>
    </table>
    
<?php require APPROOT . '/views/includes/footer.php'; ?>