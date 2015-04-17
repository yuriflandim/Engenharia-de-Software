<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<jsp:include page="../templates/header.jsp"></jsp:include>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cadastrar Operador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Operador</a></li>
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
                <form action="<c:url value="/cadastrar"/>" method="post">

                    <div class="wizard wizardReserva">
                        <h3>Dados do operador</h3>
                        <section>
                            <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="operador.name" class="form-control" id="nome">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="operador.email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="operador.phone" class="form-control" id="telefone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="operador.cPF" class="form-control" id="cpf">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" name="operador.password" class="form-control" id="senha">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permissoes">Perfil/Permissões</label>
                                    <select class="form-control" name="operador.permission" id="permissoes">
                                        <option value="Administrador">Administrador</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </section>

                        <h3>Endereço</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="logradouro">Logradouro</label>
                                            <input type="text" name="operador.address.street" class="form-control" id="logradouro">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="numero">Número</label>
                                            <input type="text" name="operador.address.number" class="form-control" id="numero">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefone">Bairro</label>
                                            <input type="text" name="operador.address.neighborhood" class="form-control" id="telefone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control" name="operador.address.city.state.name" id="estado">
                                                <option value="">Selecione</option>
                                                <option value="esta">Ceara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cidade">Cidade</label>
                                            <select class="form-control" name="operador.address.city.name" id="cidade">
                                                <option value="">Selecione</option>
                                                <option value="jua">Juazeiro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                    <!-- Colocar no value a pÃ¡gina de listagem de operadores -->
<!--                     <input type="hidden" name="redirect" value=""> -->
                        
                    
                </form>
            </div><!-- /.box -->

        </div>
    </div>

</section><!-- /.content -->
<jsp:include page="../templates/footer.jsp"></jsp:include>