<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bases saláriais
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Bases</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">    
        <div class="col-lg-8">
            
            <a href="<?php echo base_url("base/novo"); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar base</a>
            <br><br>
            
            <div class="box box-primary">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Base de cálculo mensal em R$</th>
                            <th>Alíquota</th>
                            <th>Parcela a deduzir do imposto</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            if($list){
                                foreach ($list as $value) {
                                    echo "<tr>";
                                    echo "    <td>De ".number_format($value->valor_inicial,2,",",".")." até ".number_format($value->valor_final,2,",",".")."</td>";
                                    echo "    <td> ".(empty($value->aliquota) || $value->aliquota == 0 ? "-" : number_format($value->aliquota,2,",","")."%")." </td>";
                                    echo "    <td> ".(empty($value->parcela_deduzir) || $value->aliquota == 0 ? "-" : "R$ ".number_format($value->parcela_deduzir,2,",","."))." </td>";
                                    echo "    <td>";
                                    echo "        <div class=\"btn-group\">";
                                    echo "            <a href=\"".base_url("base/editar/".$value->id)."\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
                                    echo "            <button type=\"button\" class=\"btn btn-default\" title=\"Remover base\" data-action=\"delete\" data-type=\"base\" data-url=\"".base_url("base/deleteProcess/".$value->id)."\"><i class=\"fa fa-trash-o\"></i></button>";
                                    echo "        </div>";
                                    echo "    </td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr>";
                                echo "    <td colspan=\"4\" class=\"text-center\">Nenhuma base cadastrada</td>";
                                echo "</tr>";
                            }
                        ?>

                        <tr>
                            <td>De 2.246,76 até 2.995,70</td>
                            <td>22,5%</td>
                            <td>R$ 505,62</td>
                            <td>
                                <div class="btn-group">
                                    <a href="cadastrar-base" class="btn btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url="" data-json=""><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>De 2.995,71 até 3.743,19</td>
                            <td>27,5%</td>
                            <td>R$ 692,78</td>
                            <td>
                                <div class="btn-group">
                                    <a href="cadastrar-base" class="btn btn-default" title="Editar"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url="" data-json=""><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div><!-- /.box -->
            
        </div>
    </div>

</section><!-- /.content -->