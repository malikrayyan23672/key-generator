<?php
    include_once "Database.php";
    include_once "keygen.php";
    $database = new Database();

    if(isset($_POST['submit'])){
        $key = generateKey(30);
        $starts_from = date("Y-m-d H:i:s",strtotime($_POST['starts_from']));
        $ends_at = date("Y-m-d H:i:s",strtotime($_POST['ends_at']));
        $generated_at = date("Y-m-d H:i:s");
        
        $qeury = $database->prepare("INSERT INTO `keys`(gen_key,starts_from, ends_at, generated_at) VALUES(?,?,?,?)");
        // $qeury->bindParam("key",$key);
        // $qeury->bindParam("starts_from",$starts_from);
        // $qeury->bindParam("ends_at",$ends_at);
        // $qeury->bindParam("generated_at", $generated_at);
        $qeury->execute([$key,$starts_from,$ends_at,$generated_at]);
        echo $key;
        echo $starts_from;
        echo $ends_at;
    }
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

    <div class="wrapper">
        <div class="text-center">
            <h1>Key Generator</h1>
        </div>
        <form action="index.php" method="POST" class="mt-4">
            <div>
                <input disabled type="text" class="form-control" value="<?= $key ?>" name="key">

            </div>

            <div class="d-flex gap-3">
                <div class="">
                    <label for="">Start From</label>
                    <input class="form-control" type="datetime-local" name="starts_from" id="">
                </div>
                <div>
                    <label for="">Ended at</label>
                    <input class="form-control" type="datetime-local" name="ends_at" id="">
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="submit" type="submit">Generate</button>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>