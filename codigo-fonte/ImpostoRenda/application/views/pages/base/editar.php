<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastrar Base
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Base</a></li>
        <li class="active">Cadastrar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-8">

            <div class="box box-primary">
                
                <!-- form start -->
                <form action="<?php echo base_url("base/editProcess"); ?>" method="post">
                    <div class="box-body">
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-inicial">Valor inicial</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control priceFormat" id="valor-inicial" value="<?php echo number_format($result->valor_inicial,2,",","."); ?>" name="valor_inicial">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-final">Valor final</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control priceFormat" id="valor-final" value="<?php echo number_format($result->valor_final,2,",","."); ?>" name="valor_final">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percentagem">Alíquota</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control disabled" id="percentagem" placeholder="0" disabled>
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-deducao">Valor a deduzir</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control priceFormat" id="valor-deducao" value="<?php echo number_format($result->parcela_deduzir,2,",","."); ?>" name="deducao">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <a href="<?php echo base_url("base"); ?>" class="btn btn-default">Voltar</a>
                        <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                        <button type="submit" class="btn btn-primary pull-right">Salvar alterações</button>
                    </div>
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->