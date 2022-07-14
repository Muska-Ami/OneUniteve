<?php
if(isset($_GET['reader'])) {
    switch ($_GET['reader']) {
        case 'api':
            include 'api/autoload.php';
            break;
        case 'resource':
            include 'source/autoload.php';
            break;
    }
} else {
    include 'themereader.php';
    $html = fopen($theme . "/main.html", "w+r");
    echo $html;
}