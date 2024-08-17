<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 
?>


<!DOCTYPE html>
<html>
<head>
    <title>Evaluation Table</title>
     <!-- Demo CSS (No need to include it into your project) -->
     <link rel="stylesheet" href="./css/demo.css">
      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <!-- Data Table CSS -->
      <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
      <!-- Font Awesome CSS -->
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

          <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        input {
            width: 100%;
            box-sizing: border-box;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
           
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #faf9f6;
        }
    </style>
</head>

<header class="cd__intro pt-5">
         <h1> Faculty Ranking </h1>
         <p> Criterias For Ranking Faculties from Basic Education and Tertiary Level </p>

         <ul>
            <li><a href="basic_ed_list.php">Basic Education</a></li>
            <li><a href="tertiary_list.php">Tertiary Level</a></li>
            
        </ul>
      </header>

</html>
