  $(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  fetchTasks();
  $('#task-result').hide();


  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: 'task-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
                     <li><a href="detalle.php" class="task-item">${task.dni}</a></li>
                    ` 
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });
  $('#task-form').submit(e => {
    e.preventDefault();
    const postData = {
      nombre: $('#nombre').val(),
      materno: $('#materno').val(),
      paterno: $('#paterno').val(),
      dni: $('#dni').val()
    };
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#task-form').trigger('reset');
      fetchTasks();
    });
  });


  // Fetching Tasks
  function fetchTasks() {
    $.ajax({
      url: 'tasks-list.php',
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
                  <tr taskDni="${task.dni}">
                  <a href="#" class="task-item">
                  <td>${task.dni}</td>
                  </a>
                  <td>${task.paterno}</td>
                  <td>${task.materno}</td>
                  <td>${task.nombre}</td>
                  <td>
                    <button class="task-delete btn btn-danger">
                     Delete 
                    </button>
                  </td>
                  <td>
                    <button class="task-detalle btn btn-info">
                     Detalle
                    </button>
                  </td>
                  </tr>
                `
        });
        $('#tasks').html(template);
      }
    });
  }
  // Get a Single Task by Id 
  $(document).on('click', '.task-item', (e) => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const dni = $(element).attr('taskDni');
    $.post('task-single.php', {dni}, (response) => {
      const task = JSON.parse(response);
      $('#dni').val(task.dni);
      $('#paterno').val(task.paterno);
      $('#materno').val(task.materno);
      $('#nombre').val(task.nombre);
      edit = true;
    });
    e.preventDefault();
  });
  // Delete a Single Task
  $(document).on('click', '.task-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const dni = $(element).attr('taskDni');
      $.post('task-delete.php', {dni}, (response) => {
        fetchTasks();
      });
    }
  });
//funcion detalles
  function fetchTasksDetalles() {
    $.ajax({
      url: 'tasks-detalle.php',
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
                  <tr taskDni="${task.dni}">
                  <a href="#" class="task-item">
                  <td>DNI: </td>
                  <td>${task.dni}</td>
                  </a>
                  <td>paterno:</td>
                  <td>${task.paterno}</td>
                  <td>materno:</td>
                  <td>${task.materno}</td>
                  <td>nombre:</td>
                  <td>${task.nombre}</td>
                  <td>tipo:</td>
                  <td>${task.tipo}</td>
                  <td>numero:</td>
                  <td>${task.numero}</td>
                  <td>
                  </td>
                  </tr>
                `
        });
        $('#tasks').html(template);
      }
    });
  }
  $(document).on('click', '.task-detalle', (e) => {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const dni = $(element).attr('taskDni');
      $.post('tasks-detalle.php', {dni}, (response) => {
        fetchTasksDetalles();
      });
  });
});
  