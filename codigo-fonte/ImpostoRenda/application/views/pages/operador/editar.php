<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastrar Operador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Operador</a></li>
        <li class="active">Cadastrar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-8">

            <div class="box box-primary">
                
                <!-- form start -->
                <form action="<?php echo base_url("operador/editProcess"); ?>" method="post">

                    <div class="wizard wizardNewOperador">
                        <h3>Dados do operador</h3>
                        <section class="dados-operador">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="operador[nome]" value="<?php echo $result->nome ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="operador[email]" value="<?php echo $result->email ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control mask mask-telefone" value="<?php echo $result->fone ?>" name="operador[telefone]" id="telefone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask mask-cpf" value="<?php echo $result->cpf ?>" id="cpf" name="operador[cpf]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input type="password" class="form-control" id="senha" value="<?php echo $result->senha ?>" name="operador[senha]" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="permissoes">Perfil/Permissões</label>
                                        <select class="form-control" id="permissoes" name="operador[permissao]">
                                            
                                            <?php
                                                
                                                if($result->permissao == '1'){
                                                    echo "<option value=\"1\" selected>Administrador</option>";
                                                    echo "<option value=\"2\">Comum</option>";
                                                }else{
                                                    echo "<option value=\"1\">Administrador</option>";
                                                    echo "<option value=\"2\" selected>Comum</option>";
                                                }
                                                
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3>Endereço</h3>
                        <section class="endereco">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="logradouro">Logradouro</label>
                                            <input type="text" class="form-control" id="logradouro" name="endereco[logradouro]" value="<?php echo $result->logradouro ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" id="numero" name="endereco[numero]" value="<?php echo $result->numero ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control mask mask-cep" name="endereco[cep]" value="<?php echo $result->cep ?>" id="cep">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefone">Bairro</label>
                                            <input type="text" class="form-control" id="telefone" name="endereco[bairro]" value="<?php echo $result->bairro ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control" id="estado" name="endereco[id_estado]">
                                                <option value="">Selecione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <select class="form-control" id="cidade" name="endereco[id_cidade]">
                                                <option value="">Selecione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    <input type="hidden" name="endereco[id]" value="<?php echo $result->id_endereco; ?>">
                    
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->