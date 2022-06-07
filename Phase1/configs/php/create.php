<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$make = $model = $year = $color = $hp = "";
$make_err = $model_err = $year_err = $color_err = $hp_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate make
    $input_make = trim($_POST["make"]);
    if(empty($input_make)){
        $make_err = "Please enter a Make.";
    } elseif(!filter_var($input_make, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $make_err = "Please enter a valid Make.";
    } else{
        $make = $input_make;
    }
    
    // Validate address
    $input_model = trim($_POST["model"]);
    if(empty($input_model)){
        $model_err = "Please enter an Model.";     
    } else{
        $model = $input_model;
    }
    
    // Validate salary
    $input_year = trim($_POST["year"]);
    if(empty($input_year)){
        $year_err = "Please enter the Year.";     
    } elseif(!ctype_digit($input_year)){
        $year_err = "Please enter a positive integer value.";
    } else{
        $year = $input_year;
    }

        // Validate color
        $input_color = trim($_POST["color"]);
        if(empty($input_color)){
            $color_err = "Please enter a color.";     
        } else{
            $color = $input_color;
        }
    // Validate HP
        $input_hp = trim($_POST["hp"]);
        if(empty($input_hp)){
            $hp_err = "Please enter the horsepower amount.";     
        } elseif(!ctype_digit($input_hp)){
            $hp_err = "Please enter a positive integer value.";
        } else{
            $hp = $input_hp;
        }
    
    // Check input errors before inserting in database
    if(empty($make_err) && empty($model_err) && empty($year_err) && empty($color_err) && empty($hp_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO car_demo (car_make, car_model, car_year, car_color, car_hp) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssisi", $param_make, $param_model, $param_year, $param_color, $param_hp);
            
            // Set parameters
            $param_make = $make;
            $param_model = $model;
            $param_year = $year;
            $param_color = $color;
            $param_hp = $hp;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_title; ?> - Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add vehicle record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Make</label>
                            <input type="text" placeholder="Make" name="make" class="form-control <?php echo (!empty($make_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $make; ?>">
                            <span class="invalid-feedback"><?php echo $make_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" placeholder="Model" name="model" class="form-control <?php echo (!empty($model_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $model; ?>">
                            <span class="invalid-feedback"><?php echo $model_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" placeholder="YYYY" name="year" class="form-control <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $year; ?>">
                            <span class="invalid-feedback"><?php echo $year_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" placeholder="Color" name="color" class="form-control <?php echo (!empty($color_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $color; ?>">
                            <span class="invalid-feedback"><?php echo $color_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Horsepower</label>
                            <input type="text" placeholder="NNNN" name="hp" class="form-control <?php echo (!empty($hp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $hp; ?>">
                            <span class="invalid-feedback"><?php echo $hp_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>