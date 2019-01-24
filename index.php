<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- CSS Custom -->
        <link rel="stylesheet" type="text/css" href="style.css">
    <title>Ing Ambiental</title>
</head>
<body>
  <div class="container">
    <h2 class="text-light bg-dark p-4">Elevación del Penacho</h2>
    <hr>
    <div class="row">
      <form action="insert.php" method="POST" class="col-md-12 col-lg-6">
        <div class="form-group row">                
              <label class="col-6 col-form-label">Nombre del contaminante</label>
              <div class="col-6">
                <input class="form-control" type="text" placeholder="nombre" name="nombre">
              </div>
            </div>

          <div class="form-group row">
              <label  class="col-6 col-form-label">Emisión del Gas</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="gramos/segundo" name="emisgas" step="any" required>
              </div>
            </div> 
            
            <div class="form-group row">
              <label  class="col-6 col-form-label">Altura de la chimenea</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros" name="altchim" step="any" required>
              </div>
            </div>
            <div class="form-group row">                
              <label class="col-6 col-form-label">Distancia del lugar Afectado</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros" name="distlugar" step="any" required>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-6 col-form-label">Distancia del eje y (transversal)</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros" name="disttrans" step="any">
              </div>
            </div> 
            <div class="form-group row">
              <label  class="col-6 col-form-label">Distacion del eje z</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros" name="distz" step="any">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-6 col-form-label">Diametro interior de la chimenea</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros" name="diamint" step="any" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-6 col-form-label">Temperatura de salida del Gas</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="°K" name="tempcont" step="any" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-6 col-form-label">Velocidad de salida del Gas</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros/segundo" name="veloccont" step="any" required>
              </div>
            </div>

            <div class="form-group row">
              <label  class="col-6 col-form-label">Tipo de estabilidad</label>
              <div class="col-6">
                <input class="form-control" type="text" placeholder="A-F" name="tipoestb" step="any" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-6 col-form-label">Velocidad del viento</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="metros/segundo" name="velocvient" step="any" required>
              </div>
            </div>

              <div class="form-group row">
              <label  class="col-6 col-form-label">Temperatura del Ambiente</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="°K" name="tempamb" step="any" required>
              </div>
            </div>  
            
            <!-- Presion Atmosferica -->
            <div class="form-group row">
              <label class="col-6 col-form-label">Presion Atmosferica</label>
              <div class="col-6">
                <input class="form-control" type="number" placeholder="mbar" name="presatm" step="any" required>
              </div>
            </div>
            <!-- Tipo de concentracion -->
          <div class="form-group row">
            <div class="form-group col-6">
              <label  class="col-form-label input-group-prepend" for="kind_concentr">Tipo de concentracion
              </label>
            </div>
              <div class="col-6">
                <select name="tipoconcentracion" required class="custom-select" id="kind_concentr">
                  <option value="sinreflexion">Sin Reflexion...</option>
                  <option value="conreflexion">Con Reflexion</option>
                  <option value="masafectadosz0">Mas Afectados Z = 0</option>
                  <option value="masafectadosz0y0">Mas afectados Z= 0 e Y = 0</option>
                </select>
              </div>
            </div>     
            
            <input type="submit" value="Save" class="btn btn-primary btn-block">
            <br><br>
      </form>
      <div class="col-md-12 col-lg-6 cajas d-flex align-items-center">
        <img class="img-fluid img-ing shadow-lg mb-5" src="ingenieria-ambiental1.jpg" alt="Ingeniría Ambiental" >
      </div>
    </div>
  </div>
</body>
</html>