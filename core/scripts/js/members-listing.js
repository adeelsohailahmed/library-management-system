$(document).ready(function(){

    if ($(window).width() > 800) $("#members-table").DataTable();
    else{
      $("#members-table").DataTable({
        responsive: true
    });
    }
    
    $("#members-table_length").addClass("text-white");
    $("#members-table_filter label").prepend("Filter or ");
    $("#members-table_filter label").addClass("text-white");
    $("#members-table_info").addClass("text-white");
  
    $("#members-table_filter label input").attr("placeholder", "e.g. Muhammad Ali");
    });