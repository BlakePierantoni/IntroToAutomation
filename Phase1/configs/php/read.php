<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM car_demo WHERE car_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $make = $row["car_make"];
                $model = $row["car_model"];
                $year = $row["car_year"];
                $color = $row["car_color"];
                $hp = $row["car_hp"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_title; ?> - View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .wrapper {
        width: 1024px;
        margin: 0 auto;
    }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
        <?php
        require_once "nav.php";
        ?>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Make</label>
                        <p><b><?php echo $row["car_make"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <p><b><?php echo $row["car_model"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <p><b><?php echo $row["car_year"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <p><b><?php echo $row["car_color"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Horsepower</label>
                        <p><b><?php echo $row["car_hp"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>