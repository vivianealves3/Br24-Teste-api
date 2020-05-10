<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods:GET");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
require_once "../model/company.php";
class GetByIdContactController
{
    private $company;

    public function __construct()
    {
        $this->company = new Company();
        $findOne = $this->company->getContact($_GET['id']);
        if ($findOne) {
            print_r($findOne);
        }
    }
}
new GetByIdContactController();
