<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\companies;
use App\Models\contacts;

class DashboardCompaniesController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
        $companies = (new companies())->getAllCompanies();
        $types = (new companies())->getAllTypeOfCompany();
        $data = [
            'title' => "Companies",
            'types' => $types,
            'companies' => $companies
        ];
        var_dump($data);
        return $this->view('dashboardCompanies', $data);
    }

    public function addCompany($name, $country, $tva, $type)
    {
        (new companies)->createCompany($name, $country, $tva, $type);
    }
}