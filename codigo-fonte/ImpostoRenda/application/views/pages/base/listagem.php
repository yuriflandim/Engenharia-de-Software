<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bases para cálculos
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
        
        <div class="col-md-8">
            
            <div class="row">
                <div class="col-lg-3">
                    <label class="text-muted">Ano virgência</label>
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
            
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#imposto" data-toggle="tab">Imposto</a></li>
                    <li><a href="#inss" data-toggle="tab">Inss</a></li>
                    <li><a href="#dependente" data-toggle="tab">Dependente</a></li>
                    <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="imposto">
                        
                        <table class="table tablesorter" id="tableImposto" data-sortable>
                            <thead>
                                <tr>
                                    <th class="text-center">Base de cálculo mensal</th>
                                    <th class="text-center">Alíquota</th>
                                    <th class="text-center">Parcela a deduzir do imposto</th>
                                    <th class="text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    if($listImposto){
                                        foreach ($listImposto as $value) {
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
                                            echo "    <td class=\"text-center\"> ".(empty($value->parcela_deduzir) || $value->aliquota == 0 ? "-" : "R$ ".number_format($value->parcela_deduzir,2,",","."))." </td>";
                                            echo "    <td class=\"text-center\">";
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
                        
                        <a href="<?php echo base_url("base/novo"); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar base</a>
                        
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="inss">
                        
                        <table class="table tablesorter" id="tableInss" data-sortable>
                            <thead>
                                <tr>
                                    <th class="text-center">Base de cálculo mensal</th>
                                    <th class="text-center">Alíquota</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    if($listInss){
                                        foreach ($listInss as $value) {
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
                                            echo "    <td class=\"text-center\">";
                                            echo "        <div class=\"btn-group\">";
                                            echo "            <a href=\"".base_url("inss/editar/".$value->id)."\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
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

                        <a href="<?php echo base_url("base/novo"); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar base</a>
                        
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="dependente">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(!$listDependente): ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
                                        Nehuma base desta modalidade cadastrada para ano selecionado.
                                        <br><br>
                                        <button class="btn btn-default"><i class="fa fa-plus-circle"></i> Adicionar base</button>
                                    </div>
                                <?php else: ?>
                                    <h4 class="text-muted">Valor da dedução por dependente</h4>
                                    <h2 class="text-green pull-left">R$ 30,00</h2><br><a href="" class="btn btn-link">Editar valor</a>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div>
        </div>
        
    </div>

</section><!-- /.content -->