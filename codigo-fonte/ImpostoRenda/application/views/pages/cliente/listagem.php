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
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <a href="<?php echo base_url("cliente/novo")?>" class="btn btn-default"><i class="fa fa-plus-circle"></i> Cadastrar </a>
                        <a href="<?php echo base_url("cliente/consultar")?>" class="btn btn-default"><i class="fa fa-search"></i> Consultar </a>
                    </div>
                </div>
            </div>
            <!--<a href="<?php echo base_url("cliente/novo")?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar novo cliente </a>-->
            <br>    
                        
            <div class="box box-primary">
                
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cpf</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        
                            if($list){
                                foreach ($list as $value) {
                                    
                                    echo "<tr>";
                                    echo "    <td>{$value->nome}</td>";
                                    echo "    <td>{$value->email}</td>";
                                    echo "    <td>{$value->cpf}</td>";
                                    echo "    <td>";
                                    echo "        <div class=\"btn-group\">";
                                    echo "            <a href=\"".base_url("cliente/editar/".$value->id)."\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
                                    echo "            <a href=\"".base_url("cliente/historico/".$value->id)."\" class=\"btn btn-default\" title=\"Histórico de movimentações\"><i class=\"fa fa-history\"></i></a>";
                                    echo "            <button type=\"button\" class=\"btn btn-default\" title=\"Remover\" data-action=\"delete\" data-type=\"cliente\" data-url=\"".base_url("cliente/deleteProcess/".$value->id)."\"><i class=\"fa fa-trash-o\"></i></button>";
                                    echo "        </div>";
                                    echo "    </td>";
                                    echo "</tr>";
                                    
                                }
                            }else{
                                echo "<tr>";
                                echo "    <td colspan=\"4\" class=\"text-center\"> Nenhum cliente cadastrado </td>";
                                echo "</tr>";
                                
                            }
                            
                        ?>
                        
                    </tbody>
                </table>
                
            </div><!-- /.box -->
            
            <p class="pull-right">Ultimos clientes cadastrados</p>
                
        </div>
    </div>

</section><!-- /.content -->