<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:GET");
require_once "../model/company.php";
class ListCompanyController
{

    public function __construct()
    {
        $this->company = new Company();
        $this->getValues();
    }

    public function getValues()
    {
        echo $companies = $this->company->getCompanyList();

    }
}
new ListCompanyController();
