<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bases para cálculo de INSS
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
                        
            <div class="row">
                <div class="col-lg-3">
                    <a href="<?php echo base_url("inss/novo"); ?>" class="btn btn-success btn-block"><i class="fa fa-plus-circle"></i> Adicionar base</a>
                </div>
                <div class="col-lg-3">
                    <select class="form-control" id="filterBases">
                        
                        <?php 
                            for($i = 2014; $i <= date("Y"); $i++):
                                echo "<option value=\"{$i}\" ".($i==date("Y") ? "selected" : "").">{$i}</option>";
                            endfor;
                        ?>

                    </select>
                </div>

            </div>
            <br>
            
            <div class="box box-primary">
                
                <table class="table tablesorter" data-sortable>
                    <thead>
                        <tr>
                            <th>Base de cálculo</th>
                            <th>Alíquota</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            if($list){
                                foreach ($list as $value) {
                                    echo "<tr>";
                                    
                                    echo "    <td class=\"text-center\">";
                                            if($value->valor_final > 0){
                                                if($value->valor_inicial > 0){
                                                    echo "De R$ ".number_format($value->valor_inicial,2,",",".")." até R$ ".number_format($value->valor_final,2,",",".");
                                                }else{
                                                    echo " Até R$ ".number_format($value->valor_final,2,",",".");
                                                }
                                            }else{
                                                echo "Acima de R$ ".number_format($value->valor_inicial,2,",",".");
                                            }
                                    echo "</td>";
                                    
                                    echo "    <td class=\"text-center\"> ".(empty($value->aliquota) || $value->aliquota == 0 ? "-" : number_format($value->aliquota,2,",","")."%")." </td>";
                                    echo "    <td>";
                                    echo "        <div class=\"btn-group\">";
                                    //echo "            <a href=\"".base_url("base/editar/".$value->id)."\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
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
                        
                    </tbody>
                </table>

            </div><!-- /.box -->
            
        </div>
    </div>

</section><!-- /.content -->