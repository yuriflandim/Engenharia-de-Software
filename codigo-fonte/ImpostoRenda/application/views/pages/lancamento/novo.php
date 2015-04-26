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
                <form action="" method="post">
                    <div class="box-body">
                        
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select name="cliente" class="form-control" id="cliente">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="valor-final">Valor</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control priceFormat" id="valor-final" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <!-- Colocar no value a página de listagem de bases -->
                        <input type="hidden" name="redirect" value="">
                        <button type="submit" class="btn btn-primary">Cadastar</button>
                    </div>
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->