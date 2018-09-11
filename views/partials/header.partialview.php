<!doctype html>
<html lang="en">
  <head>
    <title>
    
      <?php
          
         $title = basename($_SERVER["SCRIPT_FILENAME"], '.php'); 
         $title = str_replace("-", " ", $title);
         $title = ucwords($title);
         echo $title . ' — Library Management System';


      ?>
    
    
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- My Custom CSS -->
    <?php
      if (!empty($_SESSION["user_name"]))
      {
        echo '<link rel="stylesheet" href="core/css/logged-in-style.css">
    <link rel="stylesheet" href="core/css/goodreads-iframe.css">
    <link rel="stylesheet" href="core/css/tablesorter-bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css"/>';
      }

      else echo '<link rel="stylesheet" href="core/css/login-register-style.css">';
    ?>

  </head>
