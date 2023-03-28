<?php
class Paciente extends Crud
{
    protected $tabela = 'Paciente';
    private $idPac;
    private $nomePac;
    private $enderecoPac;
    private $bairroPac;
    private $cidadePac;

    private $estadoPac;
    private $cepPac;
    private $nascimentoPac;
    private $emailPac;

    private $celularPac;
    private $fotoPac;



    /**
     * @return mixed
     */
    public function getNomePac()
    {
        return $this->nomePac;
    }

    /**
     * @param mixed $nomePac 
     * @return self
     */
    public function setNomePac($nomePac)
    {
        $this->nomePac = $nomePac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairroPac()
    {
        return $this->bairroPac;
    }

    /**
     * @param mixed $bairroPac 
     * @return self
     */
    public function setBairroPac($bairroPac)
    {
        $this->bairroPac = $bairroPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoPac()
    {
        return $this->enderecoPac;
    }

    /**
     * @param mixed $enderecoPac 
     * @return self
     */
    public function setEnderecoPac($enderecoPac)
    {
        $this->enderecoPac = $enderecoPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadePac()
    {
        return $this->cidadePac;
    }

    /**
     * @param mixed $cidadePac 
     * @return self
     */
    public function setCidadePac($cidadePac)
    {
        $this->cidadePac = $cidadePac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadoPac()
    {
        return $this->estadoPac;
    }

    /**
     * @param mixed $estadoPac 
     * @return self
     */
    public function setEstadoPac($estadoPac)
    {
        $this->estadoPac = $estadoPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCepPac()
    {
        return $this->cepPac;
    }

    /**
     * @param mixed $cepPac 
     * @return self
     */
    public function setCepPac($cepPac)
    {
        $this->cepPac = $cepPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNascimentoPac()
    {
        return $this->nascimentoPac;
    }

    /**
     * @param mixed $nascimentoPac 
     * @return self
     */
    public function setNascimentoPac($nascimentoPac)
    {
        $this->nascimentoPac = $nascimentoPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailPac()
    {
        return $this->emailPac;
    }

    /**
     * @param mixed $emailPac 
     * @return self
     */
    public function setEmailPac($emailPac)
    {
        $this->emailPac = $emailPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCelularPac()
    {
        return $this->celularPac;
    }

    /**
     * @param mixed $celularPac 
     * @return self
     */
    public function setCelularPac($celularPac)
    {
        $this->celularPac = $celularPac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFotoPac()
    {
        return $this->fotoPac;
    }

    /**
     * @param mixed $fotoPac 
     * @return self
     */
    public function setFotoPac($fotoPac)
    {
        $this->fotoPac = $fotoPac;
        return $this;
    }
    /**
     * @return mixed
     */
    public function iserir()
    {
        $nome = $this->getNomePac();
        $endereco = $this->getEnderecoPac();
        $bairro = $this->getBairroPac();
        $cidade = $this->getCidadePac();
        $estado = $this->getEstadoPac();
        $cep = $this->getCepPac();
        $nascimento = $this->getNascimentoPac();
        $email = $this->getEmailPac();
        $celular = $this->getCelularPac();
        $foto = $this->getFotoPac();

        $sqlInserir =
            "INSERT INTO $this->tabela (nomePac , enderecoPac , bairroPac , cidadePac , estadoPac , cepPac , nascimentoPac , emailPac , celularPac , fotoPac) VALUES (  '$nome', '$endereco', '$bairro', '$cidade', '$estado', '$cep', '$nascimento', '$email', '$celular', '$foto' )";

        if (Conexao::query($sqlInserir)) {
            header('location: pacientes.php');
        }


    }

    /**
     *
     * @param mixed $campo
     * @param mixed $id
     * @return mixed
     */
    public function atualizar($campo, $id)
    {
        $nome = $this->getNomePac();
        $endereco = $this->getEnderecoPac();
        $bairro = $this->getBairroPac();
        $cidade = $this->getCidadePac();
        $estado = $this->getEstadoPac();
        $cep = $this->getCepPac();
        $nascimento = $this->getNascimentoPac();
        $email = $this->getEmailPac();
        $celular = $this->getCelularPac();
        $foto = $this->getFotoPac();


        $sqlAtualizar = "UPDATE $this->tabela set nomePac = '$nome', enderecoPac = '$endereco', bairroPac = '$bairro', cidadePac = '$cidade', estadoPac = '$estado', cepPac = '$cep', nascimentoPac ='$nascimento', emailPac= '$email', celularPac ='$celular', fotoPac='$foto'";

        if (Conexao::query($sqlAtualizar)) {
            header('location: pacientes.php');
        }


    }
}