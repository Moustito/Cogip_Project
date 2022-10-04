<?php

namespace App\Routes;

use App\Controllers\CompaniesController;
use App\Controllers\ContactsController;
use App\Controllers\InvoicesController;
use Bramus\Router\Router;
use App\Controllers\HomeController;
use http\Params;
use App\Controllers\ShowCompaniesController;
use App\Controllers\ShowContactController;
use App\Controllers\DashboardController;
use App\Controllers\DashboardInvoicesController;
use App\Controllers\DashboardCompaniesController;
use App\Controllers\DashboardContactController;


$router = new Router();

$router->get('/', function () {
    (new HomeController)->index();
});

$router->get('/contacts', function () {
    (new ContactsController)->index();
});

$router->get('/companies', function () {
    (new CompaniesController)->index();
});

$router->get('/invoices', function () {
    (new InvoicesController)->index();
});

$router->get('/showCompany', function () {
    (new ShowCompaniesController)->index();
});

$router->get('/showContact', function () {
    (new ShowContactController)->index();
});

$router->get('/dashboard', function () {
    (new DashboardController)->index();
});

$router->get('/dashboardInvoices', function () {
    (new DashboardInvoicesController)->index();
});

$router->get('/dashboardCompanies', function () {
    (new DashboardCompaniesController)->index();
});

$router->get('/dashboardContact', function () {
    (new DashboardContactController)->index();
});

$router->post('/dashboardInvoices', function () {
    $ref = $_POST['reference'];
    $price = $_POST['price'];
    $company = $_POST['companyName'];
    $dueDate = $_POST['date'];
    (new DashboardInvoicesController)->addInvoices($ref, $company, $dueDate);
    header('location:/dashboardInvoices');
});

$router->run();