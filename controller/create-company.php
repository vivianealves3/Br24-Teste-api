<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
require_once "../model/company.php";
class CreateCompanyController
{

    public $company;

    public function __construct()
    {
        $this->company = new Company();
        $this->create();
    }

    public function checkForCpfDuplicate()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $searchCpf = $this->company->checkCpf($data["cpf"]);
        $transformCpf = json_decode($searchCpf);
        $cpfResult = $transformCpf->total;
        if ($cpfResult) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkForCnpjDuplicate()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $searchCnpj = $this->company->checkCnpj($data["cnpj"]);
        $transformCnpj = json_decode($searchCnpj);
        $cnpjResult = $transformCnpj->total;
        if ($cnpjResult) {
            return $transformCnpj->result[0]->ID;
        } else {
            return 0;
        }
    }

    public function create()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->checkForCpfDuplicate() || $this->checkForCnpjDuplicate()) {
            $data["id"] = $this->checkForCnpjDuplicate();
            $result = $this->company->updateCompany($data);
            if ($result) {
                echo "Empresa atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar registro!";
            }
        } else {
            $result = $this->company->createCompany($data);
            if ($result) {
                echo "Empresa criada com sucesso!";
            } else {
                echo "Erro ao gravar registro!";
            }

        }

    }

}
new CreateCompanyController();
