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
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <a href="<?php echo base_url("lancamento/novo")?>" class="btn btn-default"><i class="fa fa-plus-circle"></i> Novo lançamento </a>
                        <a href="<?php echo base_url("lancamento/consultar")?>" class="btn btn-default"><i class="fa fa-search"></i> Consultar </a>
                    </div>
                </div>
            </div>
            <br>
            
            <div class="box box-primary">
                
                <div class="box-header with-border">
                    <h3 class="box-title">Ultimos lançamentos</h3>
                </div>
                
                <div class="box-body">
                    <table class="table tablesorter" data-sortable>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Valor do lançamanto</th>
                                <th>Alíquota</th>
                                <th>Dedução</th>
                                <th>Valor imposto</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            
                                if($result){
                                    
                                    foreach ($result as $value) {
                                        echo "<tr>";
                                        echo "    <td>".date("d/m/Y H:i:s", strtotime($value->data))."</td>";
                                        echo "    <td>{$value->nome}</td>";
                                        echo "    <td>R$ ".number_format($value->valor,2,",",".")."</td>";
                                        echo "    <td></td>";
                                        echo "    <td></td>";
                                        echo "    <td></td>";
                                        echo "</tr>";
                                    }
                                    
                                }else{
                                    echo "<tr><td colspan=\"3\">Nenhum lançamento cadastrado</td></tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                
            </div><!-- /.box -->
            
        </div>
    </div>

</section><!-- /.content -->