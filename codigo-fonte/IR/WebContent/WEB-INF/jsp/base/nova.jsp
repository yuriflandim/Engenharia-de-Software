<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<jsp:include page="../templates/header.jsp"></jsp:include>
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
                <form action="base/cadastrar" method="post">
                    <div class="box-body">
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-inicial">Valor inicial</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="base.firstValue" class="form-control" id="valor-inicial" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-final">Valor final</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="base.lastValue" class="form-control" id="valor-final" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percentagem">Alíquota</label>
                                    <div class="input-group">
                                        <input type="text" name="base.aliquot" class="form-control" id="percentagem" placeholder="0">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor-deducao">Valor a deduzir</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="base.portionDeduce" class="form-control" id="valor-deducao" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <!-- Colocar no value a pÃ¡gina de listagem de bases -->
                        <input type="hidden" name="redirect" value="">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->
<jsp:include page="../templates/footer.jsp"></jsp:include>