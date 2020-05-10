<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods:DELETE");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
require_once "../model/company.php";
class DeleteCompanyController
{
    private $company;

    public function __construct()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->company = new Company();
        if ($this->company->deleteCompany($data['id']) == true) {
            echo "Registro deletado com sucesso!";
        } else {
            echo "Erro ao deletar registro!";
        }
    }
}
new DeleteCompanyController();
