<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lançamentos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Lançamentos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-12">
            
            
            <div class="box box-solid box-info">
                <div class="box-header" data-widget="collapse">
                    <h3 class="box-title">
                        <i class="fa fa-search"></i> Filtro avançado
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-info btn-sm"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <form action="" method="post" class="filterHistoricoFuncionario" data-content-result-filter="#contentFilter">
                    
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5> Data </h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="dateInterval" class="form-control" id="dateRangePicker"/>
                                    </div><!-- /.input group -->
                                </div><!-- /.form group -->
                            </div>

                            <div class="col-md-6">
                                <h5> Cliente </h5>
                                <div class="form-group">
                                    <select name="cliente" class="form-control" data-live-search="true">
                                        <option value="">Todos</option>
                                        <?php

                                            if($funcionario){
                                                foreach ($funcionario as $value) {
                                                    echo "<option value=\"{$value->id_funcionario}\">{$value->nome}</option>";
                                                }
                                            }

                                        ?>
                                    </select>
                                </div><!-- /.form group -->
                            </div>

                        </div>
                    </div>
                    
                    <div class="box-footer text-right">
                        <button class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                    
                </form>
            </div><!-- /.box -->


            
            <div class="box box-primary">
                
                <table class="table tablesorter" data-sortable>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15/04/2015</td>
                            <td>Carlos Henrique</td>
                            <td>R$ 2.000,00</td>
                        </tr>
                        <tr>
                            <td>16/04/2015</td>
                            <td>José Cardoso</td>
                            <td>R$ 1.500,00</td>
                        </tr>
                        <tr>
                            <td>17/04/2015</td>
                            <td>Amaral Oliveira</td>
                            <td>R$ 1.250,00</td>
                        </tr>
                    </tbody>
                </table>
                
            </div><!-- /.box -->
            
            <div class="row">
                <div class="col-md-12">
                    <a href="cadastrar-lancamentos" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo Lançamento</a>
                </div>
            </div>
            
        </div>
    </div>

</section><!-- /.content -->