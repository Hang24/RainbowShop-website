<?php
session_start();


?>
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
        <h3>Product Search Results</h3>
    </div>
    <div class="search-results">
        <?php
        // Check if the form is submitted
        if (!empty($_POST["search"])) {
            // Database connection parameters
            $hostname = "localhost";
            $username = "h774t336";
            $password = "nhuhang24695";
            $database = "h774t336";
            $mysqli = new mysqli($hostname, $username, $password, $database);
            if ($mysqli->connect_errno) {
                die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysql->connect_errno");
            }

            // Get search parameters from the form
            // $productName = $_POST["search"]["pname"];
            // $warehouseCity = $_POST["search"]["warehouseCity"];
            // $minQty = $_POST["search"]["minQty"];
            // $maxQty = $_POST["search"]["maxQty"];
            // $minPrice = $_POST["search"]["minPrice"];
            // $maxPrice = $_POST["search"]["maxPrice"];

            //if(isset($_POST['submit'])) {
            $p_name = $_POST["search"]["pname"];
            $w_city = $_POST["search"]["warehouseCity"];

            
            // Phai gan gia tri mac dinh cho minQty, maxQty, minPrice, maxPrice. Neu khong gan gia tri nhung number nay rỗng
            // Nếu rỗng thì những giá trị này mặc định là string, mà string thì ko dùng được toán tử >= hay <= => ERROR
            $min_qty = ( isset($_POST["search"]["minQty"]) && !empty($_POST["search"]["minQty"]) ) ? $_POST["search"]["minQty"] : 100000;
            $max_qty = ( isset($_POST["search"]["maxQty"]) && !empty($_POST["search"]["maxQty"]) ) ? $_POST["search"]["maxQty"] : 300000;
            $min_pr = ( isset($_POST["search"]["minPrice"]) && !empty($_POST["search"]["minPrice"]) ) ? $_POST["search"]["minPrice"] : 0;
            $max_pr = ( isset($_POST["search"]["maxPrice"]) && !empty($_POST["search"]["maxPrice"] ) ) ? $_POST["search"]["maxPrice"]: 10;

          
            // Cach viet if - else
            // Kiem tra gia tri minQty ton tai, co gia tri hay khong
            // if( isset($_POST["search"]["minQty"]) && !empty($_POST["search"]["minQty"]) ) {
            //     $min_qty = $_POST["search"]["minQty"];
            // } else {
            //     $min_qty = 100000;
            // }
            // Làm tương tự cho maxQty, Min Price, Max Price
            
            //}

            $sql = "SELECT * FROM products WHERE pname LIKE '%$p_name%' AND city LIKE '%$w_city%' AND quantity >= $min_qty AND quantity <= $max_qty AND price >= $min_pr AND price <= $max_pr";
           
            $result = $mysqli->query($sql);

            // Display the results
            if ($result->num_rows > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'. $row["pid"] . '</td>';
                    echo '<td>'. $row["pname"] . '</td>';
                    echo '<td>'. $row["city"] . '</td>';
                    echo '<td>'. $row["quantity"] . '</td>';
                    echo '<td>'. $row["price"] . '</td>';
                    echo '</tr>';


                    
                    
                }
                echo '</table>';
            } else {
                echo "No results found.";
            }

            // Close the connection
            $mysqli->close();
        }
        ?> 
        <div class="another-search-btn">
            <button onclick="anotherSearch()" class="back-search">Perform Another Search</button>
            
        </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>

</html>
