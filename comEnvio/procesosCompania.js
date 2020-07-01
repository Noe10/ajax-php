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
        url: 'comEnvio/comEnvio-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          
        
          
          if(!response.error) {
            console.log(response);
            
            let tasks = JSON.parse(response);
            
            
            let template = '';
            tasks.forEach(task => {
              template += `
                     <li><a href="#" class="task-item">${task.nombreCompania}</a></li>
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
    console.log($('#taskId').val());
    
    const postData = {
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val()
    };

    const url = edit === false ? 'comEnvio/comEnvio-add.php' : 'comEnvio/comEnvio-edit.php';
    
    console.log(edit);
    
    console.log(postData, url);
    $.post(url, postData, (response) => {
      edit = false;
      $('#task-form').trigger('reset');

      fetchTasks();

    });
  });

  // Fetching Tasks
  function fetchTasks() {
    $.ajax({
      url: 'comEnvio/comEnvio-list.php',
      type: 'GET',
      success: function(response) {
     
        
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
                  <tr taskId="${task.idCompaniaEnvios}">
                  <td>${task.idCompaniaEnvios}</td>
                  <td>
                  <a href="#" class="task-item">
                    ${task.nombreCompania} 
                  </a>
                  </td>
                  <td>${task.telefono}</td>
                  <td>
                    <button class="task-delete btn btn-danger">
                     Delete 
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
    console.log('editndo')
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    console.log(id);
    
    $.post('comEnvio/comEnvio-single.php', {id}, (response) => {
     
      
      const task = JSON.parse(response);
      $('#name').val(task.nombreCompania);
      $('#description').val(task.telefono);
      $('#taskId').val(task.idCompaniaEnvios);
      edit = true;
      console.log(edit);
      
    });
    e.preventDefault();
  });

  // Delete a Single Task
  $(document).on('click', '.task-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      console.log(id);
      
      $.post('comEnvio/comEnvio-delete.php', {id}, (response) => {
        console.log(response);
        
        fetchTasks();
      });
    }
  });
});
