<?php

if(isset($_GET['reader'])) {
    switch ($_GET['reader']) {
        case 'api':
            include 'api/load.php';
            break;
        case 'resource':
            $path = $_GET['path'];
            if (isset($path)) {
                $pathd = "source/$path";
                extracted($pathd);
            }
            break;
        case 'theme-resource':
            include 'confic/class/config.php';
            $path = $_GET['path'];
            if (isset($path)) {
                $theme = (new Config)->getTheme();
                $pathd = "theme/$theme/$path";
                extracted($pathd);
            }
            break;
    }
} else if (isset($_GET['login'])) {
    include 'confic/class/config.php';
    if (isset($_GET['resx'])) {
        include 'confic/class/login.php';
        include 'confic/class/render.php';
        $username = $_GET['username'];
        $password = $_GET['password'];
        if (Login::resxUP($username, $password)) {
            setcookie("REF_TOKEN", hash("haval192,5", $password), time()+3600);
            $html = (new Render)->renderFileVariables(
                (new Login)->getLoginedSite()
            );
            echo $html;
        } else {
            header("Content-Type: application/json");
            echo json_encode(array(
                "status" => 0,
                "message" => "Authorization failed"
            ));
        }
    } else {
        if (isset($_COOKIE['REF_TOKEN']) && $_COOKIE['REF_TOKEN'] === hash("haval192,5", hash("sha224", hash("sha256", md5((new Config)->getresxPassword()))))) {
            header("Location: ?manager");
        } else {
            include 'confic/class/login.php';
            include 'confic/class/render.php';
            $html = (new Render)->renderFileVariables(
                (new Login)->getLoginSite()
            );
            echo $html;
        }
    }
} else if (isset($_GET['manager'])) {
    include 'confic/class/config.php';
    include 'confic/class/manager.php';
    include 'confic/class/render.php';
    echo (new Manager)->getManagerSite();
} else {
    include 'confic/class/config.php';
    include 'confic/class/render.php';
    $theme = (new Config)->getTheme();
    $html = (new Render)->renderFileVariables(
        file_get_contents("theme/" . $theme . "/main.html")
    );
    echo $html;
}

function extracted(string $pathd): void
{
    if (!file_exists($pathd)) {
        http_response_code(404);
    } else {
        switch (pathinfo(basename($pathd))['extension']) {
            case 'css':
                header("Content-Type: text/css");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case 'js':
                header("Content-Type: text/javascript");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case 'jpg' || 'jpeg':
                header("Content-Type: image/jpeg");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case 'png':
                header("Content-Type: image/png");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case 'svg':
                header("Content-Type: image/svg+xml");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case 'webp':
                header("Content-Type: image/webp");
                $data = file_get_contents($pathd);
                echo $data;
                break;
            case null:
                $data = file_get_contents($pathd);
                echo $data;
                break;
        }
    }
}
