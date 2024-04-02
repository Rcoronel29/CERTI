<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    


    <style>
      /* Estilos para los títulos */
      .titulo {
          color: #20b7e8;
          font-size: 3rem;
          font-weight: bold;
          text-align: center;
          margin-bottom: 30px;
          text-transform: uppercase;
      }

      .subtitulo {
          color: #20b6e8ec;
          font-size: 2rem;
          text-align: center;
          margin-bottom: 30px;
          font-style: italic;
      }

      /* Estilos para el formulario */
      .form-container {
          background-color: #f8f9fa;
          border: 1px solid #ced4da;
          border-radius: 5px;
          padding: 30px;
          margin-top: 50px;
      }

      .form-title {
          color: #20b7e8;
          font-size: 1.5rem;
          font-weight: bold;
          margin-bottom: 20px;
      }

      .form-label {
          font-weight: bold;
      }

      .form-control {
          border: 1px solid #ced4da;
          border-radius: 5px;
          padding: 10px;
      }

      .btn-primary {
          background-color: #20b7e8;
          border: none;
          padding: 10px 20px;
          font-size: 1.2rem;
          font-weight: bold;
          text-transform: uppercase;
      }

      .btn-danger {
          background-color: #dc3545;
          border: none;
          padding: 10px 20px;
          font-size: 1.2rem;
          font-weight: bold;
          text-transform: uppercase;
          margin-left: 20px;
      }
  </style>
  <body>
    <header>
      <div class="container">
            <div class="row">
                 <div id="header_img1" class="col-md-6">
                    <p></p>
                    <a href="./"><img src="{{ asset('img/logodre.png') }}" style="width: 50%;" class="img-fluid" alt="DRE"></a>
                 </div>
                 <div id="header_img2" class="col-md-6 text-right">
                    <p></p>
                    <a href="http://www.minedu.gob.pe/" target="_blank"><img src="{{ asset('img/logominedu.png') }}" class="img-fluid" alt="MINEDU"></a>
                    
                    
                 </div>               
            </div>
      </div>
    </header>

   <div class="mt40"></div>
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-9">
                    <h1 class="titulo">CONSULTAS DE CERTIFICADOS DIGITALES&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<a href="/login"><i class="fas fa-sign-in-alt"></i></a></h1>
                    <p>Explore de forma gratuita nuestras herramientas de consulta, diseñadas para acceder y revisar con facilidad los certificados emitidos a través de nuestra plataforma</p>
                </div>
                <div class="col-md-2">&nbsp;</div>
            </div>
            <br>

             <!-- Formulario de búsqueda -->
<div class="row">
  <div class="col-md-3">&nbsp;</div>
  <div class="col-md-6">
      <form method="get" action="{{ route('buscarConsulta') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row align-items-center">
              <div class="col-md-8">
                <label class="control-label" for="dni"><strong class="text-secondary">Ingrese el número de DNI:</strong></label>
                  <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" maxlength="8" onkeypress="return valnumero(event)" required>
                  
              </div>
              <div class="col-md-4">
                  <div class="btn-group" role="group" aria-label="Botones de acción">
                      <button type="submit" class="btn btn-primary">BUSCAR</button>
                      <a href="./" class="btn btn-danger">LIMPIAR</a>
                  </div>
              </div>
          </div>
      </form>
  </div>
  <div class="col-md-3">&nbsp;</div>
</div>

            <br>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
          @yield('contenidoPrincipal') <!-- Aqui se menciona que hasta esta parte es el contenedor principal o hasta donde se selecciona-->
        </div>
    </div>

       
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
  


  </body>
</html>
