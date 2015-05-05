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
        <div class="col-lg-12">

            <div class="box box-primary">
                <form action="" method="post" class="wizardNewClient">
                    <div class="wizard">
                        <h3>Dados do cliente</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="e-mail">E-mail</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask mask-cpf" id="cpf">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control mask mask-telefone" id="telefone">
                                    </div>
                                </div>

                            </div>
                        </section>
                        
                        <h3>Endereço</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="logradouro">Logradouro</label>
                                            <input type="text" class="form-control" id="logradouro">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" id="numero">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control mask mask-cep" id="cep">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefone">Bairro</label>
                                            <input type="text" class="form-control" id="telefone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control" id="estado">
                                                <option value="">Selecione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <select class="form-control" id="cidade">
                                                <option value="">Selecione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3>Dependentes</h3>
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
                        </section>

                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    <input type="hidden" name="endereco[id]" value="<?php echo $result->id_endereco; ?>">

                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->