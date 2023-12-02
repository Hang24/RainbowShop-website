<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Search Product - Rainbow Shop</title>
</head>
<body>
    <div class="header">
        <h1>Rainbow Shop Wholesale Dealer</h1>
        <h3>Product Search</h3>
    </div>
    <div class="search">
        <form method="post" action="search-result.php">
            <label for="">Product Name (substring)</label>
            <input type="text" class="input-text" name="search[pname]">
            <label for="">Warehouse City (substring)</label>
            <input type="text" class="input-text" name="search[warehouseCity]">
            
            <div class="form-group">
                <div class="form-element first">
                    <label for="">Minimum Quantity</label>
                    <input type="number" class="input-text" name="search[minQty]">
                </div>
                <div class="form-element">
                    <label for="">Maximum Quantity</label>
                    <input type="number" class="input-text" name="search[maxQty]">
                </div>
            </div>
            <div class="form-group">
                <div class="form-element first">
                    <label for="">Minimum Price</label>
                    <input type="number" class="input-text" name="search[minPrice]">
                </div>
                <div class="form-element"> 
                    <label for="">Maximum Price</label>
                    <input type="number" class="input-text" name="search[maxPrice]">
                </div>
            </div>
            <div class="buttons-form">
                <input type="reset" value="Clear Form" class="clear-form-btn">
                <input type="submit" value="Search Products" class="submit-btn">
            </div>
        </form>
        
    </div>
    
</body>
</html>