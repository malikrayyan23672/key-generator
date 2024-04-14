<?php

    include_once "time.php";

require 'vendor/autoload.php';
use Carbon\carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key generator</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <nav>
            <div>
                <h3>Key Generator</h3>
            </div>
            <ul>
                <li><a href="index.php">Generate</a></li>
                <li><a href="keys.php">Keys</a></li>
            </ul>
        </nav>
    </header>

    <div class="main_container">
        <div class="row row-cols-auto gap-3 justify-content-center">
           
        <?php
            foreach($rows as $row){
                $start = Carbon::now();
                $end = new Carbon($row['ends_at']);
                $diff = $start->diff($end);
                if(Carbon::now()->greaterThanOrEqualTo($end)){
                    $diff = "0 hour 0 minutes 0 seconds";
                    $status = "Expired";
                }else{
                    $status = "Active";
                }
?>
 <div class="box">
                <div>
                    <h3 id="title" class=""><?= $diff ?></h3>
                </div>
                <div>
                    <p class="bg-secondary-subtle"><?= $row['gen_key']?></p>
                </div>
                <div>
                    <p>Starts From <span><?= $row['starts_from'] ?></span></p>
                    <p>Ends At     <span><?= $row['ends_at'] ?></span></p>
                </div>
                <div>
                    <?php
                        if($status == "Expired"){

                        ?>
                    <p class="fw-bold">Status <span class="alert alert-danger p-2"><?= $status ?></span></p>
                    <?php
                        }else{

                            ?>
                    <p class="fw-bold">Status <span class="alert alert-primary p-2"><?= $status ?></span></p>
                    <?php

                        }

                    ?>
                </div>
                <div>
                    <button id="delete-btn" data-id="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                </div>
            </div>
            <?php
            }
        ?>
        </div>
    </div>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>