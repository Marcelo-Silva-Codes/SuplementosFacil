<?php
session_start();


ini_set('display_errors', 1);
error_reporting(E_ALL);

$controller  = $_GET['controller'] ?? 'suplemento';
$action      = $_GET['action']   ?? 'home';

$controllerClass = ucfirst($controller) . 'Controller';
$controllerPath  = __DIR__ . '/app/controllers/' . $controllerClass . '.php';

if (!file_exists($controllerPath)) {
    echo "Controller \"{$controllerClass}\" não encontrado em \"{$controllerPath}\".";
    exit;
}

require_once $controllerPath;

if (!class_exists($controllerClass)) {
    echo "Classe controller \"{$controllerClass}\" não definida no arquivo.";
    exit;
}

$ctrl = new $controllerClass();

if (!method_exists($ctrl, $action)) {
    echo "Método/action \"{$action}\" não encontrado em controller \"{$controllerClass}\".";
    exit;
}

if (isset($_GET['id'])) {
    $ctrl->$action($_GET['id']);
} else {
    $ctrl->$action();
}
