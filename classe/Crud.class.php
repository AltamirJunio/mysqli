<?php
abstract class Crud{
    protected $tabela;
    public abstract function iserir();
    public abstract function atualizar($campo, $id);

    public function listar()
    {
        $sqlSelect = "select * from {$this->tabela}";
        return Conexao::query($sqlSelect);
    }

}
