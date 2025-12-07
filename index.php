<?php
//session_start();


$controller = $_GET['controller'] ?? 'suplemento';
$action     = $_GET['action'] ?? 'listar';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerPath  = __DIR__ . '/app/controllers/' . $controllerClass . '.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerObj = new $controllerClass();

    if (method_exists($controllerObj, $action)) {
        if (isset($_GET['id'])) {
            $controllerObj->$action($_GET['id']);
        } else {
            $controllerObj->$action();
        }
    } else {
        echo "Ação '$action' não encontrada no controller '$controllerClass'.";
    }
} else {
    echo "Controller '$controllerClass' não encontrado.";
}

