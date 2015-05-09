<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Histórico de movimentações<br>
        <small><?php echo $clientName; ?></small>
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="<?php echo base_url("cliente"); ?>">Clientes</a></li>
        <li class="active">Histórico de movimentações</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-12">
            
            <div class="box box-primary">
                
                <div class="box-body">
                    <table class="table tablesorter" data-sortable>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor do lançamento</th>
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