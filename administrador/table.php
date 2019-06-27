<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>TECNOMINA S.A.C</title>
    <!-- BOOTSTRAP 4  -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
  </head>
  <body>

    <!-- NAVIGATION  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">PERSONAL TRAJADORA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline my-2 my-lg-0">
            <input id="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </nav>
    <!--from add -->
    <div class="container">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORM TO ADD TASKS -->
              <form id="task-form">
                <div class="form-group">
                  <input type="text" id="dni" class="form-control" placeholder="DNI">
                </div>
                <div class="form-group">
                  <input type="text" id="paterno" class="form-control" placeholder="paterno">
                </div>
                <div class="form-group">
                  <input type="text" id="materno" class="form-control" placeholder="materno">
                </div>
                <div class="form-group">
                  <input type="text" id="nombre" class="form-control" placeholder="nombre">
                </div>
                <input type="hidden" id="taskDni">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar Datos
                </button>
              </form>
            </div>
          </div>
        </div>
        <!-- TABLE  -->
        <div class="col-md-7">
          <div class="card my-4" id="task-result">
            <div class="card-body">
              <!-- SEARCH -->
              <ul id="container"></ul>
            </div>
          </div>
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td>DNI</td>
                <td>Paterno</td>
                <td>Materno</td>
                <td>Nombre</td>
                <td>Acción</td>
              </tr>
            </thead>
            <tbody id="tasks"></tbody>
          </table>
        </div>
        <div> 
        </div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Frontend Logic -->
    <script src="app.js"></script>
  </body>

</html>
