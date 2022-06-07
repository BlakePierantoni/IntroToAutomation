<?php
// Include config file
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .wrapper {
        width: 1024px;
        margin: 0 auto;
    }

    table tr td:last-child {
        width: 120px;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">


            <?php
        require_once "nav.php";
                 /* Attempt select query execution
                 - Average HP  
                    
                 SELECT AVG(`ContainerDemo`.`car_demo`.`car_hp`) AS `AverageHP` from `ContainerDemo`.`car_demo`;
                 
                 - Count of Cars
                    
                 SELECT COUNT(*) FROM `ContainerDemo`.`car_demo` WHERE 1;
                 
                 - Top color and Count of color
                    
                 SELECT car_color, COUNT(`ContainerDemo`.`car_demo`.`car_color`) AS `car_count` FROM `ContainerDemo`.`car_demo` GROUP BY `ContainerDemo`.`car_demo`.`car_color` ORDER BY `car_count` DESC;
                 
                 */
                ?>
            <p>
                <?php
                    $sql = "SELECT COUNT(*) AS `car_count` FROM `ContainerDemo`.`car_demo` WHERE 1;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<h5>Total Number of Cars - ". $row['car_count']."</h5>";
                                mysqli_free_result($result);
                                }
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                ?>
                                <?php
                    $sql = "SELECT AVG(`ContainerDemo`.`car_demo`.`car_hp`) AS `AverageHP` from `ContainerDemo`.`car_demo`;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                echo "<h5>Average Horsepower (HP) - ". $row['AverageHP']."</h5>";
                                mysqli_free_result($result);
                                }
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                ?>

            <p>
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>Top Colors</th>
                    <th>Count</th>
                </tr>

                <?php
                    $sql = "SELECT car_color, COUNT(`ContainerDemo`.`car_demo`.`car_color`) AS `car_count` FROM `ContainerDemo`.`car_demo` GROUP BY `ContainerDemo`.`car_demo`.`car_color` ORDER BY `car_count` DESC;";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                <tr>
                    <td><?php echo $row['car_color']?></td>
                    <td><?php echo $row['car_count']?></td>
                </tr>

                <?php          
                                }
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
            </table>
            <p>

        </div>
    </div>
    </div>
    </div>
</body>

</html>