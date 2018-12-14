<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" /> -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css"> -->
    


    <!-- Import css file -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="assets\css\style.css" /> -->

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js"></script> -->

    <title>Requirement Prioritization</title>
<!-- <script>
      $(document).ready(function(){
    $('.terserah').formSelect();
  });
</script> -->
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
         
        // Script untuk modal
        $(document).ready(function() {
            $('.modal').modal();
        });

    </script>

</head>

<body>
    <header>
        <!-- Tombol menu sidebar kalau web di zoom -->
        <div class="container">
            <a class="top-nav sidenav-trigger waves-effect waves-light circle hide-on-large-only" href="#" data-target="nav-mobile">
                <i class="material-icons">menu</i>
            </a>
        </div>

        <!-- Menu sidebar -->
        <ul id="nav-mobile" class="sidenav sidenav-fixed" style="width: 18%;">
            <li class="bold"><a href="<?php echo base_url(); ?>" class="waves-effect waves-teal">Tutorial</a></li>
            <li class="bold"><a class="waves-effect waves-teal" disabled>Daftar Kebutuhan</a>
                <ul>
                    <!-- <li class="bold"><a href="<?php echo base_url(); ?>kebutuhanFungsional" class="waves-effect waves-teal">Kebutuhan Fungsional</a>
                    <li class="bold"><a href="<?php echo base_url(); ?>kebutuhanNonfungsional" class="waves-effect waves-teal">Kebutuhan Non-fungsional</a> -->
                    <li class="bold"><a href="<?php echo site_url("AnalisController/showFungsional"); ?>" class="waves-effect waves-teal">Kebutuhan Fungsional</a>
                    <li class="bold"><a href="<?php echo site_url("AnalisController/showNonfungsional"); ?>" class="waves-effect waves-teal">Kebutuhan Non-fungsional</a>
                    
                </ul>
            </li>
            <li class="bold"><a href="<?php echo base_url(); ?>prioritasiNonfungsional" class="waves-effect waves-teal">Prioritasi Kebutuhan</a></li>
        </ul>
        <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger waves-effect hide-on-large-only"><i class="material-icons">menu</i></a> -->
    </header>
    <main>
        <div id="index-banner" class="section no-pad-bot" style="background: #e8eaf6 ;">
            <div class="container">
                <!-- Div Tutorial -->
                <div class="row">
                    <div class="col s12 m10 offset-m1">