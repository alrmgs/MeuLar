<?php
class Animals {
   private $id,$codigo,$nome,$porte,$sexo,$descricao,$saude,$img_animais;
   function __construct($nome, $porte, $sexo, $descricao, $saude, $img_animais) {
       $this->nome = $nome;
       $this->porte = $porte;
       $this->sexo = $sexo;
       $this->descricao = $descricao;
       $this->saude = $saude;
       $this->img_animais = $img_animais;
   }
   function getId() {
       return $this->id;
   }

   function setId($id) {
       $this->id = $id;
   }

      function getCodigo() {
       return $this->codigo;
   }

   function getNome() {
       return $this->nome;
   }

   function getPorte() {
       return $this->porte;
   }

   function getSexo() {
       return $this->sexo;
   }

   function getDescricao() {
       return $this->descricao;
   }

   function getSaude() {
       return $this->saude;
   }

   function getImg_animais() {
       return $this->img_animais;
   }

   function setCodigo($codigo): void {
       $this->codigo = $codigo;
   }

   function setNome($nome): void {
       $this->nome = $nome;
   }

   function setPorte($porte): void {
       $this->porte = $porte;
   }

   function setSexo($sexo): void {
       $this->sexo = $sexo;
   }

   function setDescricao($descricao): void {
       $this->descricao = $descricao;
   }

   function setSaude($saude): void {
       $this->saude = $saude;
   }

   function setImg_animais($img_animais): void {
       $this->img_animais = $img_animais;
   }



}
