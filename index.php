<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ecommerce</title>
</head>

<body>
    <h1>
        <?php
        include_once('system/libraries/Main.php');
        include_once('system/libraries/ParentController.php');
        include_once('system/libraries/Load.php');
        $main = new Main();

        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $url = $_GET['url'];
            $rtrimUrl = rtrim($url, '/');
            $arrayUrl = explode('/', filter_var($rtrimUrl, FILTER_SANITIZE_URL));

            if (isset($arrayUrl[0])) {
                include_once('app/controllers/' . $arrayUrl[0] . '.php');
                $controller = new $arrayUrl[0]();
                if (isset($arrayUrl[1])) {
                    if (isset($arrayUrl[2])) {
                        $controller->{$arrayUrl[1]}($arrayUrl[2]);
                    } else {
                        $controller->{$arrayUrl[1]}();
                    }
                }
            }
        } else {
            include_once('app/controllers/Index.php');
            $index = new Index();
            $index->homePage();
        }
        ?>
    </h1>
</body>

</html>