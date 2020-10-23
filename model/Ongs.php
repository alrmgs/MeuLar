<?php
class Ongs extends Document {
    private $id,$cnpj,$imagem_Ongs;
    public function __construct($nome, $email,$senha,$endereco, $bairro, $cidade, $uf, $cep, $contato,$cnpj,$imagem) {
        parent::__construct($nome,$email,$senha, $endereco, $bairro, $cidade, $uf, $cep, $contato);
        $this->cnpj=$cnpj;
        $this->imagem_Ongs=$imagem;
        }
        function getImagem_Ongs() {
            return $this->imagem_Ongs;
        }

        function setImagem_Ongs($imagem) {
            $this->imagem_Ongs = $imagem;
        }

   function getCnpj() {
            return $this->cnpj;
        }

      
        function setCnpj($cnpj): void {
            $this->cnpj = $cnpj;
        }
        function getId() {
            return $this->id;
        }

        function setId($id): void {
            $this->id = $id;
        }




}
