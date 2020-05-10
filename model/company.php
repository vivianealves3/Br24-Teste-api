<?php
require "../helper/helper.php";
class Company
{
    public function createCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1588901076" => $data["nome"],
                "UF_CRM_1588903094" => $data["cpf"],
                "UF_CRM_1588901065" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getCompany($id)
    {

        $queryUrl = baseUrl() . '/crm.company.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getCompanyList()
    {
        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'order' => array("DATE_CREATE" => "ASC"),
            'select' => array("ID", "TITLE", "UF_CRM_1588901076", "UF_CRM_1588903094", "UF_CRM_1588901065", "PHONE", "EMAIL"),
        )
        );

        return doRequest($queryUrl, $queryData);
    }

    public function deleteCompany($id)
    {
        $queryUrl = baseUrl() . '/crm.company.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        return doRequest($queryUrl, $queryData);

    }

    public function updateCompany($data)
    {
        $queryUrl = baseUrl() . '/crm.company.update.json';
        $queryData = http_build_query(array(
            'ID' => $data["id"],
            'fields' => array(
                "TITLE" => $data["empresa"],
                "UF_CRM_1588901076" => $data["nome"],
                "UF_CRM_1588903094" => $data["cpf"],
                "UF_CRM_1588901065" => $data["cnpj"],
                "PHONE" => array(
                    array(
                        "VALUE" => $data["telefone"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
                "EMAIL" => array(
                    array(
                        "VALUE" => $data["email"],
                        "VALUE_TYPE" => "WORK",
                    ),
                ),
            ),
        ));

        return doRequest($queryUrl, $queryData);
    }

    public function createContact($data)
    {
        $queryUrl = baseUrl() . '/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "NAME" => $data["nome"],
                "LAST_NAME" => $data["sobrenome"],
                'COMPANY_ID' => $data["id"],
            ),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function getContact($id)
    {

        $queryUrl = baseUrl() . '/crm.contact.list.json';
        $queryData = http_build_query(array(
            'filter' => array("COMPANY_ID" => $id),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function checkCpf($cpf)
    {

        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1588903094" => $cpf),
        ));
        return doRequest($queryUrl, $queryData);

    }

    public function checkCnpj($cnpj)
    {

        $queryUrl = baseUrl() . '/crm.company.list.json';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1588901065" => $cnpj),
        ));
        return doRequest($queryUrl, $queryData);

    }

}
