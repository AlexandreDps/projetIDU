<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Devoirs</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
      <style>
         body {
            background-image: url('https://www.collegetransitions.com/wp-content/uploads/2014/05/shutterstock_789412672-1200x675.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px); 
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
         }
         .container {
           display: flex;
           flex-wrap: wrap;
           padding: 10px;
           box-sizing: border-box;
           max-width: 1200px;
           border: none;
           border-radius: 10px;
		   margin: 0 auto;
         }
         .widget-container {
           display: flex;
           flex-wrap: wrap;
           justify-content: space-between;
           max-width: 1200px;
           margin: 0 auto;
           padding: 20px;
           box-sizing: border-box;
           background-color: transparent;
           border: none;
           border-radius: 10px;
           width: 87%;
		   margin: 0 auto;
         }
         .widget {
           background-color: #f9f9f9;
           border: 1px solid #ccc;
           padding: 10px;
           margin: 10px;
           flex-basis: calc(25% - 20px);
           box-sizing: border-box;
           cursor: pointer;
           border: none;
           border-radius: 10px;
         }
         .widget h2 {
           font-size: 20px;
           margin: 0 0 10px 0;
         }
         .widget p {
           font-size: 14px;
           margin: 0;
         }
         .widget img {
           max-width: 100%;
           height: auto;
         }
		main.table {
			width: 82vw;
			height: 90vh;
			background-color: #fff5;
			backdrop-filter: blur(7px);
			box-shadow: 0 .4rem .8rem #0005;
			border-radius: .8rem;
			overflow: hidden;
		}
		.table__header {
			width: 100%;
			height: 10%;
			background-color: #fff4;
			padding: .8rem 1rem;
			display: flex;
			justify-content: space-between;
			align-items: center;
			visibility:hidden
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}

.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}

table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}
       </style>
   </head>
   <body class="main-layout">
<?php
require 'vendor/autoload.php';

use MongoDB\Client;

// Instantiate the MongoDB client
$client = new Client('mongodb://localhost:27017');

// Select a database and collection
$database = $client->StudentApp;
$collection = $database->homework;

// Perform operations on the collection
$result = $collection->find();
$elements = $result->toArray();
$hw=(array)$elements[0];
?>
      <div class="header">
            <div class="row d_flex">
                <a href="cours.php">Online class</a>
                <div class="col-xl-7 col-lg-9 col-md-10 col-sm-12">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div  class="collapse navbar-collapse" id="navbarsExample04" >
                        <ul class="navbar-nav mr-auto" border-radius= "10px">
                           <li class="nav-item active">
                              <a class="nav-link" href="cours.php">cours</a>
                           </li>
                           <li class="nav-item ">
                              <a class="nav-link" href="homework.php">devoirs</a>
                           </li>
                           <li class="nav-item ">
                              <a class="nav-link" href="notes.php">notes</a>
                           </li>
                           <li class="nav-item ">
                              <a class="nav-link" href="Polypoints.php">Polypoints</a>
                           </li>
                           <li class="nav-item ">
                            <a class="nav-link" href="statistique.php">Statistiques</a>
						   </li>
                           <li class="nav-item ">
                            <a class="nav-link" href="schedule.php">EDT</a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
      </div>
	  <div class="table">
        <section class="table__header">
            <h1 style="visibility:hidden">Mes devoirs</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Module <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Description <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Devoir <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$arrlength = count($hw['jour']);
						if ($arrlength == 0)
						{
							echo "<td>No homework to be done</td>";
						}
						else
						{
							for ($i=0;$i<$arrlength-1;$i++)
							{	
								echo "<tr>";
								echo "<td>".$hw['matieres'][$i]."</td>";
								echo "<td>".$hw['activites'][$i]."</td>";
								echo "<td>".$hw['jour'][$i]."</td>";
								echo "<td>".$hw['heure'][$i]."</td>";
								echo "</tr>";
							}
						}
				?>

            </table>
        </section>
    </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>