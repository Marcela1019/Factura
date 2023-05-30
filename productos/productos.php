<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once ("../config.php"); // Trae la clase 

$data = new Productos(); // instanciar variable de tipo config - cuando dices New invoca el constructor 

$all = $data->obtainAll();
/* $empleado = $data->obtaintEmpleado();
$cliente = $data->obtaintCliente(); */

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/stylos.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Super Market</h3>
        <img src="../imagen/imagen.png" alt="" class="imagenPerfil">
        <h3>Marcela Betancourt</h3>
      </div>
      <div class="menus">
        <a href="/Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../categoria/categoria.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Categorias</h3>
        </a>

        <a href="../cliente/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Clientes</h3>
        </a>

        <a href="../empleado/empleado.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Empleado</h3>
        </a>

        <a href="../factura/factura.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Factura</h3>
        </a>

        <a href="../proveedores/proveedor.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Proveedor</h3>
        </a>

        <a href="../productos/roductos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 600;">Productos</h3>
        </a>

      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Productos</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#Producto</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Unidades</th>
              <th scope="col">Stock</th>
              <th scope="col">Categoria</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Descontinuado</th>
              <th scope="col">ELIMINAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado Dinamico desde la Base de Datos -->
            <?php
                  foreach($all as $key => $val){ 
              ?>
                  <tr>
                      <td> <?php echo $val['id']?></td>
                      <td> <?php echo $val['nombreproducto']?></td>
                      <td> <?php echo $val['precioUnitario']?></td>
                      <td> <?php echo $val['unidadesPedidas']?></td>
                      <td> <?php echo $val['stock']?></td>
                      <td> <?php echo $val['id_categoria']?></td>
                      <td> <?php echo $val['id_proveedor']?></td>
                      <td> <?php echo $val['descontinuado']?></td>
                                          
                      <td> <a class="btn btn-danger " href="productoBorrar.php?id=<?=$val['id']?>&req=delete">Borrar</a>
                      <a class="btn btn-warning" href="productoActualizar.php?id=<?=$val['id']?>">Editar</a></td>
                    </tr>
                <?php
                  };
                ?>
       

          </tbody>
        
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Producto</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

    <!-- /////////Modal de registro de nuevo Empleado //////////-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="productoNuevo.php" method="post">
            <div class="mb-1 col-12">
                <label for="nombreproducto" class="form-label">Nombre Producto</label>
                <input 
                  type="text"
                  id="nombreproducto"
                  name="nombreproducto"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-4">
                <label for="precioUnitario" class="form-label">Precio Producto</label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-4">
                <label for="unidadesPedidas" class="form-label">Unidades Pedidas</label>
                <input 
                  type="number"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-4">
                <label for="stock" class="form-label">Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                />
              </div>


            <div class="mb-1 col-12">
                <label for="id_categoria" class="form-label">Nombre Categoria</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                  <option value="">Seleccione Categoria</option>
                  <?php
                    foreach($cliente as $key => $valCln){
                  ?>
                  <option value="<?php echo $valCln['id']?>"><?php echo $valCln['clienteNombre']?></option>
                  <?php
                    }
                  ?>
                </select>
       
              </div>
              <div class="mb-1 col-12">
                <label for="id_empleado" class="form-label">Nombre Empleado </label>
                <select class="form-control" name="id_empleado" id="id_empleado">
                  <option value="">Seleccione Empleado</option>
                  <?php
                    foreach($empleado as $key => $valEmp){
                  ?>
                  <option value="<?php echo $valEmp['id']?>"><?php echo $valEmp['empleadoNombre']?></option>
                  <?php
                    }
                  ?>
                </select>
             
              </div> 


              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">Fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="Guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>