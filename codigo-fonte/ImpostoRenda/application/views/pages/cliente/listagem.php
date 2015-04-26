<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Clientes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-8">
            <div class="box box-primary">

                <table class="table tablesorter" data-sortable>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cpf</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Carlos Henrique</td>
                            <td>microheyn@gmail.com</td>
                            <td>044.444.444-44</td>
                            <td>
                                <div class="btn-group">
                                    <a href="cadastrar-cliente" class="btn btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-default" title="Remover"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>José Antônio</td>
                            <td>jose@gmail.com</td>
                            <td>555.555.555-55</td>
                            <td>
                                <div class="btn-group">
                                    <a href="cadastrar-cliente" class="btn btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-default" title="Remover"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div><!-- /.box -->
            
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url("cliente/novo")?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar novo cliente </a>
                </div>
            </div>
            
        </div>
    </div>

</section><!-- /.content -->