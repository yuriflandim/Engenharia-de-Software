<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Novo lançamento
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Lançamentos</a></li>
        <li class="active">Cadastrar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-5">

            <div class="box box-primary">
                
                <!-- form start -->
                <form action="<?php echo base_url("lancamento/newProcess"); ?>" method="post">
                    <div class="box-body">
                        
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select name="cliente" class="form-control" id="cliente" <?php echo !$clientes ? "disabled" : ""; ?>>
                                        
                                        <?php
                                            if($clientes){
                                                foreach ($clientes as $value){
                                                    echo "<option value=\"{$value->id}\">{$value->nome} ({$value->cpf})</option>";
                                                }
                                            }else{
                                                echo "<option>Nenhum cliente cadastrado</option>";
                                            }
                                        ?>
                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control priceFormat" name="valor" id="valor" placeholder="0,00" <?php echo !$clientes ? "disabled" : ""; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <!-- Colocar no value a página de listagem de bases -->
                        <input type="hidden" name="redirect" value="<?php echo base_url("lancamento"); ?>">
                        <button type="submit" class="btn btn-primary" <?php echo !$clientes ? "disabled" : ""; ?>>Cadastar</button>
                    </div>
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->