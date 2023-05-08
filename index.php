<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <section>
            <?php
            $pages_dir = 'frontend';
            if(!empty($_GET['p'])){
                $n = $_GET['p'];
                if(!preg_match("/^[a-zA-Z0-9_,.]*$/", $n)){
                    include($pages_dir.'/home.php');
                }
                else{
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages))
                        include($pages_dir.'/'.$p.'.php');
                    else
                        echo 'Halaman tidak ditemukan!';
                }
            } else
                include($pages_dir.'/home.php');
            ?>
        </section>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="function.js"></script>
</body>
</html>