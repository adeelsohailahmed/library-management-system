$(document).ready(function(){

    if ($(window).width() > 800) $("#issued-books-table").DataTable();
    else{
      $("#issued-books-table").DataTable({
        responsive: true
    });
    }
    
    $("#issued-books-table_length").addClass("text-white");
    $("#issued-books-table_filter label").prepend("Filter or ");
    $("#issued-books-table_filter label").addClass("text-white");
    $("#issued-books-table_info").addClass("text-white");
  
    $("#issued-books-table_filter label input").attr("placeholder", "e.g. War and Peace");
    });