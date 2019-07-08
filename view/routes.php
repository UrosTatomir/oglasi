<?php 
require_once '../controllers/Controller.php';
$controller= new Controller();

$page=isset($_GET['page'])?$_GET['page']:"";

switch($page){
    case 'odaberi':
    $controller->filterOglasa();
    break;

    case 'showindex':
    $controller->refreshIndex();
    break;
    
    case 'showlogin':
    include 'login.php';
    break;

    case 'showregister':
    $controller->showRegister();
    break;

    case 'Odjavi se':
    $controller->logout();
    break;

    case 'show dodaj oglas':
    $controller->showDodajOglas();
    break;

    case 'details':
    $controller->showDetails();
    break;

    case 'delete':
    $controller->deleteOglasa();
    break;

    
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $page=isset($_POST['page'])?$_POST['page']:"";

  switch($page){
    case 'Registracija':
    $controller->registration();
    break;

    case 'Prijavi se':
    $controller->login();
    break;

    case 'dodaj oglas':
    $controller->dodajOglas();
    break;
    
   
    
  }
}
?>