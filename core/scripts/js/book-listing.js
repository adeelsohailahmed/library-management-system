$(document).ready(function(){

  if ($(window).width() > 800) $("#book-table").DataTable();
  else{
    $("#book-table").DataTable({
      responsive: true
  });
  }
  
  $("#book-table_length").addClass("text-white");
  $("#book-table_filter label").prepend("Filter or ");
  $("#book-table_filter label").addClass("text-white");
  $("#book-table_info").addClass("text-white");

  $("#book-table_filter label input").attr("placeholder", "e.g. War and Peace");
  });