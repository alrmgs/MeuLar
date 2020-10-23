<?php
class Person extends Document{
  private $id,$cpf;
    public function __construct($nome,$email,$senha, $endereco, $bairro, $cidade, $uf, $cep, $contato,$cpf) {
        parent::__construct($nome,$email,$senha, $endereco, $bairro, $cidade, $uf, $cep, $contato);
        $this->cpf=$cpf;
        } 
        function getCpf() {
            return $this->cpf;
        }

        function setCpf($cpf): void {
            $this->cpf = $cpf;
        }
        function getId() {
            return $this->id;
        }

        function setId($id): void {
            $this->id = $id;
        }







}
