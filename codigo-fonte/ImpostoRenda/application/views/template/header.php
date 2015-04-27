<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>IR - Imposto de Renda</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="<?php echo base_url("assets/css/fonts/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="<?php echo base_url("assets/css/fonts/ionicons.min.css"); ?>" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="<?php echo base_url("assets/css/AdminLTE.css"); ?>" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url("assets/css/skin-default.css"); ?>" rel="stylesheet" type="text/css" />
        
        <!-- Data Table-->
        <!--<link href="assets/plugins/datatables/TableTools.css" rel="stylesheet">-->
        <!--<link href="assets/plugins/datatables/jquery.dataTables.css" rel="stylesheet">-->
        
        <!-- pnotify -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/pnotify/jquery.pnotify.default.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/pnotify/jquery.pnotify.default.icons.css"); ?>">
        
        <!-- Sortable -->
        <link href="<?php echo base_url("assets/plugins/sortable/style.css"); ?>" rel="stylesheet">
        
        <!-- Steps -->
        <link href="<?php echo base_url(); ?>assets/plugins/steps/jquery.steps.css" rel="stylesheet" type="text/css" />
        
        <!-- iCheck -->
        <link href="<?php echo base_url("assets/plugins/iCheck/flat/blue.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url("assets/plugins/datepicker/datepicker3.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker-bs3.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <!--<link href="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>" rel="stylesheet" type="text/css" />-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-default fixed">
        
        <div id="loader">
            <div class="iconLoader"></div>
        </div>
        
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo"><b>IR</b> <span class="small">Imposto de Renda</span></a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url("assets/img/avatar5.png"); ?>" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs">Carlos Henrique</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url("assets/img/avatar5.png"); ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            Carlos Henrique - Desenvolvedor
                                            <small>Membro desde Abr. 2015</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Link #01</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Link #02</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Link #03</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url("index")?>" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url("assets/img/avatar5.png"); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Carlos Henrique</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Pesquisar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Menu</li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-home"></i> <span>Início</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("base"); ?>">
                                <i class="fa fa-dashboard"></i> <span>Base</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("operador"); ?>">
                                <i class="fa fa-users"></i>
                                <span>Operadores</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("cliente"); ?>">
                                <i class="fa fa-users"></i> <span>Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("lancamento"); ?>">
                                <i class="fa fa-calendar"></i> <span>Lançamentos</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">