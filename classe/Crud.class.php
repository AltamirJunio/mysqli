<?php
abstract class Crud{
    protected $tabela;
    public abstract function iserir();
    public abstract function atualizar($campo, $id);
    

}
