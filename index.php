<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Libreria Jquery-->
    <script src="Librerias/Jquery/jquery.min.js"></script>
    <!--Libreria Bootstrap 	Css-->
    <link href="Css/Bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Libreria Bootstrap Js-->
    <script src="Librerias/Boostrap4/bootstrap.min.js"></script>
    <!--Css FontAwesome -->
	<link rel="stylesheet" type="text/css" href="Librerias/FontAwesome/css/all.min.css">
	
	<!--Css Login -->
    <link rel="stylesheet" type="text/css" href="Css/login.css">
    
    <!--Sweet Alert -->
    <script src="Librerias/SweetAlert/sweetalert2.js"></script>
    <!-- -->

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-headerLogin">
                    <h3>Ingresar</h3>
                </div>
                <div class="card-body">
                    <form method="post" id="frmLogin" onsubmit="return logear()">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario" required="">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="Contraseña" class="form-control"  name="Contraseña" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Aceptar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
            function logear() {
                $.ajax({                  
                    type:"POST",
                    data:$('#frmLogin').serialize(),
                    url:"Procesos/Usuarios/Login/login.php",
                    success: function(respuesta) {
                        respuesta = respuesta.trim();
                        if (respuesta == 1){
                            window.location = "vistas/inicio.php";
                        }else{
                            Swal.fire("Error","Eliga el Usuario Indicado","error");
                            
                        }
                    }
                })
                return false;
            }
    </script>
</body>

</html>