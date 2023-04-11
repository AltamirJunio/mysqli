<?php
abstract class Crud{
    protected $tabela;
    public abstract function inserir();
    public abstract function atualizar($campo, $id);

    public function listar()
    {
        $sqlSelect = "select * from {$this->tabela}";
        return Conexao::query($sqlSelect);
    }

    public function buscar($campo, $id)
    {
        $selectSql = "select * from {$this->tabela} where $campo = {$id}";
        $dados = Conexao::query($selectSql);
        return $dados->fetch_object();
    }

}
