<?php
if(isset($_GET['reader'])) {
    switch ($_GET['reader']) {
        case 'api':
            include 'api/autoload.php';
            break;
        case 'resource':
            $path = $_GET['path'];
            if (isset($path)) {
                $pathd = "source/" . $path;
                if(!file_exists($pathd)) {
                    http_response_code(404);
                } else {
                    switch ($_GET['type']) {
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
                        case null:
                            $data = file_get_contents($pathd);
                            echo $data;
                            break;
                    }
                }
            }
            break;
    }
} else if (isset($_GET['login'])) {
    include 'confic/class/login.php';
    include 'confic/class/config.php';
    include 'confic/class/render.php';
    $html = (new Render)->renderFileVariables(
        (new Login)->getLoginSite()
    );
    echo $html;
} else {
    include 'confic/class/config.php';
    include 'confic/class/render.php';
    $theme = (new Config)->getTheme();
    $html = (new Render)->renderFileVariables(
        file_get_contents("theme/" . $theme . "/main.html")
    );
    echo $html;
}