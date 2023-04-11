<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        </nav>
    </header>
    <main>
        <div class="container">
            <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });

            if (filter_has_var(INPUT_GET, 'id')) {
                $id = filter_input(INPUT_GET, 'id');
                $paciente = new Paciente();
                $editPac = $paciente->buscar('idPac', $id);
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                $paciente->deletar($id);
            }

            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                if (isset($_FILES['filFoto'])) {
                    $ext = strtolower(pathinfo($_FILES['filFoto']['name'], PATHINFO_EXTENSION));
                    $nomArq = filter_input(INPUT_POST, 'nomeAntigo');
                    if(empty($nomArq)){
                        $nomArq = md5(date('Y.m.d-H.i.s')) . $ext;
                    }
                   
                    $local = "imagensPac/";
                    move_uploaded_file($_FILES['filFoto']['tmp_name'], $local . $nomArq);

                }
                $paciente = new Paciente();
                $id = filter_input(INPUT_POST, 'txtId');
                $paciente->setNomePac(filter_input(INPUT_POST, 'txtNome'));
                $paciente->setEnderecoPac(filter_input(INPUT_POST, 'txtEndereco'));
                $paciente->setBairroPac(filter_input(INPUT_POST, 'txtBairro'));
                $paciente->setCidadePac(filter_input(INPUT_POST, 'txtCidade'));
                $paciente->setEstadoPac(filter_input(INPUT_POST, 'txtEstado'));
                $paciente->setCepPac(filter_input(INPUT_POST, 'txtCep'));
                $paciente->setNascimentoPac(filter_input(INPUT_POST, 'txtNascimento'));
                $paciente->setEmailPac(filter_input(INPUT_POST, 'txtEmail'));
                $paciente->setCelularPac(filter_input(INPUT_POST, 'txtCelular'));
                $paciente->setFotoPac($nomArq);
                if(empty($id)){
                    $paciente->inserir();
                } else{
                    $paciente->atualizar('idPac', $id);
                }
                
            }

            ?>

            <form class="row g-3" action="<?php echo
                htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="txtId"  value="<?php echo isset($editPac->idPac) ? $editPac->idPac : null ?>">

                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome"
                        value="<?php echo isset($editPac->nomePac) ? $editPac->nomePac : null ?>">
                </div>
                <div class="col-12">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="txtEndereco" placeholder="Digite seu endereço..."
                        name="txtEndereco"
                        value="<?php echo isset($editPac->enderecoPac) ? $editPac->enderecoPac : null ?>">
                </div>

                <div class="col-12">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="txtBairro" placeholder="Digite seu bairro..."
                        name="txtBairro" value="<?php echo isset($editPac->bairroPac) ? $editPac->bairroPac : null ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" placeholder="Digite sua cidade..."
                        name="txtCidade" value="<?php echo isset($editPac->cidadePac) ? $editPac->cidadePac : null ?>">
                </div>

                

                <div class="col-md-4">
                
                    <label for="txtEstado" class="form-label">Estado</label>
                    <?php $estadoSelect = isset($editPac->estadoPac) ?
                        $editPac->estadoPac : null; 
                        ?>
                  <select id="txtEstado" class="form-select" name="txtEstado">
                        <option value="" selected hidden>Escolha...</option>
                        <option value="AC" <?php
                        if ($estadoSelect == "AC") {
                            echo 'selected';
                        }
                        ?>>Acre</option>
                        <option value="AL"<?php
                        if ($estadoSelect == "AL") {
                            echo 'selected';
                        }
                        ?>>Alagoas</option>
                        <option value="AP" <?php
                        if ($estadoSelect == "AP") {
                            echo 'selected';
                        }
                        ?>>Amapá</option>
                        <option value="AM" <?php
                        if ($estadoSelect == "AM") {
                            echo 'selected';
                        }
                        ?>>Amazonas</option>
                        <option value="BA" <?php
                        if ($estadoSelect == "BA") {
                            echo 'selected';
                        }
                        ?>>Bahia</option>
                        <option value="CE" <?php
                        if ($estadoSelect == "CE") {
                            echo 'selected';
                        }
                        ?>>Ceará</option>
                        <option value="DF" <?php
                        if ($estadoSelect == "DF") {
                            echo 'selected';
                        }
                        ?>>Distrito Federal</option>
                        <option value="ES" <?php
                        if ($estadoSelect == "ES") {
                            echo 'selected';
                        }
                        ?>>Espírito Santo</option>
                        <option value="GO"
                        <?php
                        if ($estadoSelect == "GO") {
                            echo 'selected';
                        }
                        ?>>Goiás</option>
                        <option value="MA" <?php
                        if ($estadoSelect == "MA") {
                            echo 'selected';
                        }
                        ?>>Maranhão</option>
                        <option value="MT" <?php
                        if ($estadoSelect == "MT") {
                            echo 'selected';
                        }
                        ?>>Mato Grosso</option>
                        <option value="MS" <?php
                        if ($estadoSelect == "MS") {
                            echo 'selected';
                        }
                        ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php
                        if ($estadoSelect == "MG") {
                            echo 'selected';
                        }
                        ?>>Minas Gerais</option>
                        <option value="PA" <?php
                        if ($estadoSelect == "PA") {
                            echo 'selected';
                        }
                        ?>>Pará</option>
                        <option value="PB" <?php
                        if ($estadoSelect == "PB") {
                            echo 'selected';
                        }
                        ?>>Paraíba</option>
                        <option value="PR" <?php
                        if ($estadoSelect == "PR") {
                            echo 'selected';
                        }
                        ?>>Paraná</option>
                        <option value="PE" <?php
                        if ($estadoSelect == "PE") {
                            echo 'selected';
                        }
                        ?>>Pernambuco</option>
                        <option value="PI" <?php
                        if ($estadoSelect == "PI") {
                            echo 'selected';
                        }
                        ?>>Piauí</option>
                        <option value="RJ" <?php
                        if ($estadoSelect == "RJ") {
                            echo 'selected';
                        }
                        ?>>Rio de Janeiro</option>
                        <option value="RN" <?php
                        if ($estadoSelect == "RN") {
                            echo 'selected';
                        }
                        ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php
                        if ($estadoSelect == "RS") {
                            echo 'selected';
                        }
                        ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php
                        if ($estadoSelect == "RO") {
                            echo 'selected';
                        }
                        ?>>Rondônia</option>
                        <option value="RR" <?php
                        if ($estadoSelect == "PR") {
                            echo 'selected';
                        }
                        ?>>Roraima</option>
                        <option value="SC" <?php
                        if ($estadoSelect == "SC") {
                            echo 'selected';
                        }
                        ?>>Santa Catarina</option>
                        <option value="SP" <?php
                        if ($estadoSelect == "SP") {
                            echo 'selected';
                        }
                        ?>>São Paulo</option>
                        <option value="SE" <?php
                        if ($estadoSelect == "SE") {
                            echo 'selected';
                        }
                        ?>>Sergipe</option>
                        <option value="TO" <?php
                        if ($estadoSelect == "TO") {
                            echo 'selected';
                        }
                        ?>>Tocantins</option>
                    </select>
                </div>


                <div class="col-md-2">
                    <label for="txtCep" class="form-label">Cep</label>
                    <input type="text" class="form-control" id="txtCep" name="txtCep"
                        value="<?php echo isset($editPac->cepPac) ? $editPac->cepPac : null ?>">
                </div>
                <div class="col-12">
                    <label for="txtEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu email..."
                        name="txtEmail" value="<?php echo isset($editPac->emailPac) ? $editPac->emailPac : null ?>">
                </div>

                <div class="col-md-6">
                    <label for="txtNascimento" class="form-label">Nascimento</label>
                    <input type="date" class="form-control" id="txtNascimento" name="txtNascimento"
                        value="<?php echo isset($editPac->nascimentoPac) ? $editPac->nascimentoPac : null ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular"
                        value="<?php echo isset($editPac->celularPac) ? $editPac->celularPac : null ?>">
                </div>

                <input type="hidden" name="nomeAntigo" value="<?php echo isset($editPac->fotoPac) ? $editPac->fotoPac : null ?>">

                <div class="col-12">
                    <label for="filFoto" class="form-label">Adicione sua Foto</label>
                    <input class="form-control" type="file" id="filFoto" name="filFoto"
                        value="<?php echo isset($editPac->fotoPac) ? $editPac->fotoPac : null ?>">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="btnDeletar">delete</button>
                </div>

            </form>
        </div>


        <footer>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>