<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Cliente</a></li>
        <li class="active">Editar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-9">

            <div class="box box-primary">
                <form action="<?php echo base_url("cliente/editProcess"); ?>" method="post" class="wizardNewClient">
                    <div class="wizard">
                        <h3>Dados do cliente</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" name="cliente[nome]" id="nome" value="<?php echo $result->nome; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="e-mail">E-mail</label>
                                        <input type="email" class="form-control"name="cliente[email]" id="email" value="<?php echo $result->email; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control mask mask-cpf" name="cliente[cpf]" id="cpf" value="<?php echo $result->cpf; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control onlyNumber" name="cliente[rg]" id="rg" value="<?php echo $result->rg; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control mask mask-telefone" name="cliente[telefone]" id="telefone" value="<?php echo $result->fone; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="quantidade_dependentes">Dependentes</label>
                                        <input type="text" class="form-control onlyNumber" name="cliente[quantidade_dependentes]" id="quantidade_dependentes"  value="<?php echo $result->quantidade_dependentes; ?>">
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
                                            <input type="text" class="form-control" name="endereco[logradouro]" id="logradouro" value="<?php echo $result->logradouro; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="text" class="form-control" name="endereco[numero]" id="numero" value="<?php echo $result->numero; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control mask mask-cep" name="endereco[cep]" id="cep" value="<?php echo $result->cep; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" name="endereco[bairro]" id="bairro" value="<?php echo $result->bairro; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control estado" name="endereco[id_estado]" id="estado" data-parent=".endereco">
                                                <?php
                                    
                                                    if($result->id_estado == ""){
                                                        echo "<option value=\"\"> -- Selecione -- </option>";
                                                    }

                                                    if($estados){
                                                        foreach ($estados as $value) {
                                                            echo "<option value=\"{$value->id}\" ".($value->id === $result->id_estado ? "selected" : "")."> {$value->nome} </option>";
                                                        }
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <select class="form-control cidade" id="cidade" name="endereco[id_cidade]">
                                                <?php

                                                    if($listaCidades){
                                                        foreach ($listaCidades as $value) {
                                                            echo "<option value=\"{$value->id}\" ".($value->id === $result->id_cidade ? "selected" : "")."> {$value->nome} </option>";
                                                        }
                                                    }else{
                                                        echo "<option value=\"\"> -- Selecione um estado -- </option>";
                                                    }

                                                ?>
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