<?php
class TemporaryHomer extends Document {
    private $id,$cpf,$imgComprovante;
    public function __construct($nome,$email,$senha, $endereco, $bairro, $cidade, $uf, $cep, $contato,$cpf,$img) {
        parent::__construct($nome,$email,$senha, $endereco, $bairro, $cidade, $uf, $cep, $contato);
        $this->cpf=$cpf;
        $this->imgComprovante=$img;
        }
        function getCpf() {
            return $this->cpf;
        }

        function getImgComprovante() {
            return $this->imgComprovante;
        }

        function setCpf($cpf): void {
            $this->cpf = $cpf;
        }

        function setImgComprovante($imgComprovante): void {
            $this->imgComprovante = $imgComprovante;
        }
        function getId() {
            return $this->id;
        }

        function setId($id): void {
            $this->id = $id;
        }




}
