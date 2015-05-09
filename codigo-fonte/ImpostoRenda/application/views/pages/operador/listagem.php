<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Operadores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Operadores</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-8">
            
            <a href="<?php echo base_url("operador/novo"); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar operador</a>
            <br><br>    
            
            <div class="box box-primary">
                <table class="table tablesorter" data-sortable>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Permissões</th>
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
                                    echo "    <td>".($value->permissao == "1" ? "Administrador" : "Comum")."</td>";
                                    echo "    <td>";
                                    echo "        <div class=\"btn-group\">";
                                    echo "            <a href=\"".base_url("operador/editar/".$value->id)."\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
                                    echo "            <button type=\"button\" class=\"btn btn-default\" title=\"Remover\" data-action=\"delete\" data-type=\"operador\" data-url=\"".base_url("operador/deleteProcess/".$value->id)."\"><i class=\"fa fa-trash-o\"></i></button>";
                                    echo "        </div>";
                                    echo "    </td>";
                                    echo "</tr>";
                                    
                                }
                            }else{
                                echo "<tr>";
                                echo "    <td colspan=\"4\" class=\"text-center\"> Nenhum operador cadastrado </td>";
                                echo "</tr>";
                                
                            }
                            
                        ?>

                    </tbody>
                </table>

            </div><!-- /.box -->
            
        </div>
    </div>

</section><!-- /.content -->