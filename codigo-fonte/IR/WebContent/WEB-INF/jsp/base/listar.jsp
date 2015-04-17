<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<jsp:include page="../templates/header.jsp"></jsp:include>
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
            <div class="box box-primary">

                <table class="table">
                            <thead>
                                <tr>
                                    <th>Base de c�lculo mensal em R$</th>
                                    <th>Al�quota</th>
                                    <th>Parcela a deduzir do imposto</th>
                                    <th>Base</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>De 0 at� 1.499,15</td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title="Editar base"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>De 1.499,16 at� 2.246,75</td>
                                    <td>7,5%</td>
                                    <td>R$ 112,43</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title="Editar base"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>De 2.995,71 at� 3.743,19</td>
                                    <td>15%</td>
                                    <td>R$ 280,94</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title="Editar base"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>De 2.246,76 at� 2.995,70</td>
                                    <td>22,5%</td>
                                    <td>R$ 505,62</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title="Editar base"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url="" data-json=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>De 2.995,71 at� 3.743,19</td>
                                    <td>27,5%</td>
                                    <td>R$ 692,78</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" title="Editar base"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default" title="Remover base" data-action="delete" data-type="base" data-url="" data-json=""><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

            </div><!-- /.box -->
            
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-success"><i class="fa fa-plus-circle"></i> Adicionar base</a>
                </div>
            </div>
            
        </div>
    </div>

</section><!-- /.content -->
<jsp:include page="../templates/footer.jsp"></jsp:include>