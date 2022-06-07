<?php
// Include config file
require_once "config.php";
 
// TODO: Fix this
$make = $model = $year = $color = $hp = "";
$make_err = $model_err = $year_err = $color_err = $hp_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_make = trim($_POST["make"]);
    if(empty($input_make)){
        $make_err = "Please enter a make.";
    } elseif(!filter_var($input_make, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $make_err = "Please enter a valid make.";
    } else{
        $make = $input_make;
    }
    
    // Validate address address
    $input_model = trim($_POST["model"]);
    if(empty($input_model)){
        $model_err = "Please enter an model.";     
    } else{
        $model = $input_model;
    }
    
    // Validate salary
    $input_year = trim($_POST["year"]);
    if(empty($input_year)){
        $year_err = "Please enter the year amount.";     
    } elseif(!ctype_digit($input_year)){
        $year_err = "Please enter a positive integer value.";
    } else{
        $year = $input_year;
    }
    
    // Validate name
    $input_color = trim($_POST["color"]);
    if(empty($input_color)){
        $color_err = "Please enter a color.";
    } elseif(!filter_var($input_color, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $color_err = "Please enter a valid color.";
    } else{
        $color = $input_color;
    }

    // Validate salary
    $input_hp = trim($_POST["hp"]);
    if(empty($input_hp)){
        $hp_err = "Please enter HP.";     
    } elseif(!ctype_digit($input_hp)){
        $hp_err = "Please enter a positive integer value.";
    } else{
        $hp = $input_hp;
    }


    // Check input errors before inserting in database
    if(empty($make_err) && empty($model_err) && empty($year_err) && empty($color_err) && empty($hp_err)){
        // Prepare an update statement
        $sql = "UPDATE car_demo SET car_make=?, car_model=?, car_year=?, car_color=?, car_hp=? WHERE car_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssisii", $param_make, $param_model, $param_year, $param_color, $param_hp, $param_id);
            
            // Set parameters
            $param_make = $make;
            $param_model = $model;
            $param_year = $year;
            $param_id = $id;
            $param_color = $color;
            $param_hp = $hp;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM car_demo WHERE car_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_title; ?> - Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the vehicle record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Make</label>
                            <input type="text" name="make" class="form-control <?php echo (!empty($make_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $make; ?>">
                            <span class="invalid-feedback"><?php echo $make_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control <?php echo (!empty($model_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $model; ?>">
                            <span class="invalid-feedback"><?php echo $model_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $year; ?>">
                            <span class="invalid-feedback"><?php echo $year_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control <?php echo (!empty($color_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $color; ?>">
                            <span class="invalid-feedback"><?php echo $color_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>HP</label>
                            <input type="text" name="hp" class="form-control <?php echo (!empty($hp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $hp; ?>">
                            <span class="invalid-feedback"><?php echo $hp_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>