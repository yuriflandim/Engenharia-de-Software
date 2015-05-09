<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastrar Cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Cliente</a></li>
        <li class="active">Cadastrar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-9">

            <div class="box box-primary">
                <form action="<?php echo base_url("cliente/newProcess"); ?>" method="post" class="wizardNewClient">
                    <div class="wizard">
                        <h3>Dados do cliente</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" name="cliente[nome]" id="nome">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="e-mail">E-mail</label>
                                        <input type="email" class="form-control"name="cliente[email]" id="email">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask mask-cpf" name="cliente[cpf]" id="cpf">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control onlyNumber" name="cliente[rg]" id="rg">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control mask mask-telefone" name="cliente[telefone]" id="telefone">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="quantidade_dependentes">Dependentes</label>
                                        <input type="text" class="form-control onlyNumber" name="cliente[quantidade_dependentes]" id="quantidade_dependentes" value="0">
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
                                            <input type="text" class="form-control" name="endereco[logradouro]" id="logradouro">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" name="endereco[numero]" id="numero">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control mask mask-cep" name="endereco[cep]" id="cep">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefone">Bairro</label>
                                            <input type="text" class="form-control" name="endereco[bairro]" id="telefone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control estado" name="endereco[id_estado]" id="estado" data-parent=".endereco">
                                                <option value="">Selecione</option>
                                                <?php
                                                    foreach ($estados as $value_uf):
                                                        echo "<option value=\"{$value_uf->id}\">{$value_uf->nome}</option>";
                                                    endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <select class="form-control cidade" id="cidade" name="endereco[id_cidade]">
                                                <option value="">Selecione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

<!--                        <h3>Dependentes</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-12" id="dependentes">
                                    
                                    <div class="alert alert-info alert-dismissable">
                                        <h4><i class="icon fa fa-warning"></i> Nenhum dependente adicionado!</h4>
                                        Para adicionar dependetes a este cliente, clique no link abaixo.
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-default btn-add-fields"><span class="fa fa-plus-circle"></span> Adicionar dependente</a>
                                </div>
                                
                            </div>
                        </section>-->

                    </div>
                    
                    <!-- Colocar no value a página de listagem de clientes -->
                    <input type="hidden" name="redirect" value="<?php echo base_url("cliente"); ?>">
                        
                    
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->