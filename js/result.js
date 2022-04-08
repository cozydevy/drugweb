$(document).ready(function(){

// Assigned User Dropdown Filter
$('#assigned-user-filter').on('change', function() {
    var assignedUser = this.value;
    
    if(assignedUser === 'None'){
      $('.task-list-row').hide().filter(function() {
        return $(this).data('assigned-user') != assignedUser;
      }).show();
    }else{
      $('.task-list-row').hide().filter(function() {
        return $(this).data('assigned-user') == assignedUser;
      }).show();   
    }
  });
  
  
  // Task Status Dropdown Filter
  $('#status-filter').on('change', function() {
    var taskStatus = this.value;
    
    if(taskStatus === 'Any'){
      $('.task-list-row').hide().filter(function() {
        return $(this).data('status') != taskStatus;
      }).show();
    }else{
      $('.task-list-row').hide().filter(function() {
        return $(this).data('status') == taskStatus;
      }).show();   
    }
  });
  
  
  
  // Task Milestone Dropdown Filter
  $('#milestone-filter').on('change', function() {
    var taskMilestone = this.value;
    
    if(taskMilestone === 'None'){
      $('.task-list-row').hide().filter(function() {
        return $(this).data('milestone') != taskMilestone;
      }).show();
    }else{
      $('.task-list-row').hide().filter(function() {
        return $(this).data('milestone') == taskMilestone;
      }).show();  
    }
  });
  
  
  // Task Priority Dropdown Filter
  $('#priority-filter').on('change', function() {
    var taskPriority = this.value;
    
    if(taskPriority === 'Any'){
      $('.task-list-row').hide().filter(function() {
        return $(this).data('priority') != taskPriority;
      }).show();
    }else{
      $('.task-list-row').hide().filter(function() {
        return $(this).data('priority') == taskPriority;
      }).show();  
    }
  });
  
  
  // Task Tags Dropdown Filter
  $('#tags-filter').on('change', function() {
    var taskTags = this.value;
    
    if(taskTags === 'None'){
      $('.task-list-row').hide().filter(function() {
        return $(this).data('tags') != taskTags;
      }).show();
    }else{
      $('.task-list-row').hide().filter(function() {
        return $(this).data('tags') == taskTags;
      }).show(); 
    }
  });
  

  
  /*
  future use for a text input filter
  $('#search').on('click', function() {
      $('.box').hide().filter(function() {
          return $(this).data('order-number') == $('#search-criteria').val().trim();
      }).show();
  });*/

});