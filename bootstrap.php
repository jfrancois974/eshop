<?php

ini_set('display_errors', 1);

session_start();


function partial($name, $params = [])
{
    // revient à utiliser extract($params);
    foreach ($params as $key => $value) {
        $$key = $value;                             
    }

    require(__DIR__ . "/html_partials/{$name}.html.php");
}

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function pdo()
{
    $params = parse_ini_file('database/database.ini');
    if ($params === false) {
        throw new Exception("Error reading database configuration file");
        
    }
    $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
                    $params['host'],
                    $params['port'],
                    $params['database'],
                    $params['user'],
                    $params['password']);

    $pdo = new PDO($conStr);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function redirect($url)
{
    header("Location: $url");
    die();
}

function redirect_unless_admin()
{
    if (!($_SESSION['admin'] ?? null)) {
        redirect('/admin/login.php');
    }
}

function abort_404()
{
    http_response_code(404);
    die();
}