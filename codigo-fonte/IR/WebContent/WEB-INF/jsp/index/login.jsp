<!DOCTYPE html>
<html class="bg-login">
    <head>
        <meta charset="UTF-8">
        <title> Login </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="assets/css/fonts/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        
        <link href="assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="bg-login">
        
        <div id="loader">
            <div class="iconLoader"></div>
        </div>
        
        <div class="form-box" id="login-box">
            <div class="header">
                
                <div class="col-md-12">
                    <h1>IR</h1>
                </div>
                <small>Imposto de Renda</small>
            </div>
            <form action="" method="post" id="login">
                <div class="body">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="microheyn@gmail.com"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" value="123"/>
                    </div>  
                    <a href="${pageContext.request.contextPath}/dashboard" class="btn">
                        <i class="fa fa-chevron-right"></i>
                    </a>  
<!--                     <button type="submit" class="btn"> -->
<!--                         <i class="fa fa-chevron-right"></i> -->
<!--                     </button> -->
                </div>
            </form>

        </div>

        <!-- jQuery 2.0.2 -->
        <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap -->
        <script src="assets/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <!-- login -->
        <script src="assets/js/login.js" type="text/javascript"></script>
        
    </body>
</html>