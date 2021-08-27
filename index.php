<?php
include_once 'includes/survey.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Encuesta</title>
</head>
<body>
<?php
$survey = new Survey();
$showResults = false;
$option = '';

if(isset($_POST['lenguaje'])){
    $showResults = true;

    $survey->setOptionSelected($_POST['lenguaje']);
    $survey->vote();
}
?>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Inicio</a></li>
        </ul>
    </header>
</div>

<div class="container ">
    <div class="card mt-4">
        <div class="card-header text-center">
            <h2>¿Lenguaje de programación favorito?</h2>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                <?php
                if($showResults){
                    $queryLanguages = $survey->showResults();

                    echo "<h2>" . $survey->getTotalVotes() . " votos totales</h2>";

                    foreach ($queryLanguages as $lenguaje) {
                        $porcentaje = $survey->getPercentageVotes($lenguaje['votos']);

                        include 'vistas/vista-resultados.php';
                    }
                }else{
                    include 'vistas/vista-votacion.php';
                }
                ?>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="text-muted">&copy; 2021 Jordy Vega</span>
        </div>
    </footer>
</div>
</body>
</html>