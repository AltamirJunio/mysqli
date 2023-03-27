<?php
abstract class Crud{
    protected $tabela;
    abstract function iserir();
    abstract function atualizar($campo, $id);
    

}