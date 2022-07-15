<?php
switch ($_GET['sw']) {
    case 'loginurl':
        include 'api/graph.php';
        echo (new Graph)->startLoginUrl();
        break;
}
