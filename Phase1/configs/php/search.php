<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>HappyCars Search</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>
    <table class="table table-hover">
        <thead>
            <tr class="table-secondary">
                <td>ID</td>
                <td>Make</td>
                <td>Model</td>
                <td>Year</td>
                <td>Color</td>
                <td>HP</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = '10.0.0.24';
            $username = 'reader';
            $password = 'Notr00t1';
            $dbname = 'ContainerDemo';

            $search_value = $_POST["search"];
            $connect = new mysqli($servername, $username, $password, $dbname);
            if ($connect->connect_error) {
                echo 'Connection Failed: ' . $connect->connect_error;
            } else {
                $results = mysqli_query($connect, "SELECT * FROM car_demo where car_make like '%$search_value%'");
                while ($row = mysqli_fetch_array($results)) {
            ?>
                <tr class="table-light">
                    <td><?php echo $row['car_id'] ?></td>
                    <td><?php echo $row['car_make'] ?></td>
                    <td><?php echo $row['car_model'] ?></td>
                    <td><?php echo $row['car_year'] ?></td>
                    <td><?php echo $row['car_color'] ?></td>
                    <td><?php echo $row['car_hp'] ?></td>
                </tr>
            <?php

            }
        }
            
            ?>
        
        </tbody>
    </table>

    </body>
</html>