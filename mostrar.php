<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Resultados</title>
    <style>
        .cp {
            cursor:pointer;
        }
        .fa-trash {
            color:red;
        }
        .fa-pen{
            color:green;
        }
    </style>
</head>
<body>
    <h3 class="text-center">Contaminantes</h3><hr>

    

    <div class="table-responsive-xl container">
    <form action="index.php" method="POST">
        <input type="submit" value="Insertar datos" class="btn btn-success">
    </form>
    <br>
<table class="table">
    
    <thead class="thead-dark">
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">Nombres del contaminante</th>
        <th scope="col" class="text-center">Elevación m</th>
        <th scope="col" class="text-center">Concentración (g/m3)</th>
        <th scope="col" class="text-center">Horizontal | sigmaY m</th>
        <th scope="col" class="text-center">Vertical | sigmaZ m</th>
        <th scope="col" class="text-center">Tipo</th>
        <th scope="col" class="text-center">Eliminar</th>     
    </thead>

    <?php
    include("conexion.php");
    $consulta = "SELECT * FROM sustancias";
    $resultado = mysqli_query ($mysqli, $consulta);
    $n = 0;
    while( $row = mysqli_fetch_array($resultado) )
    {$n++;
        $id = $row['id'];
        echo "<tr>";
        echo "<td scope='row'>".$n."</td>";
        echo "<td class='text-center'>".$row['nombre']."</td>";
        echo "<td class='text-center'>".$row['elevacion']. " m</td>";
        echo "<td class='text-center'>".$row['concentracion']."</td>";
        echo "<td class='text-center'>".$row['horizontal']."</td>";
        echo "<td class='text-center'>".$row['vertical']."</td>";
        echo "<td class='text-center'>".$row['tipo_de_contam']."</td>";        
        echo "<td><a href='borrar.php?id=$id' class='d-flex justify-content-center'><i class='fas fa-trash' title='eliminar'></i></a></td>";
        echo"</tr>";
    }
    echo "</table></div>";
    
    
    ?>
</body>
</html>