<?php

include ("Character.php");
include ("Episodes.php");
include ("Locations.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$seed = 4312; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

$charactersJ = json_decode(file_get_contents($api_url . "characters"), true);
$episodesJ = json_decode(file_get_contents($api_url . "episodes"), true);
$locationsJ = json_decode(file_get_contents($api_url . "locations"), true);

function getSortedCharactersById($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = $i; $j < count($characters); $j++) {
            if (intval($characters[$i]["id"]) > intval($characters[$j]["id"])) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByOrigin($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = $i; $j < count($characters); $j++) {
            if ($characters[$i]["origin"] > $characters[$j]["origin"]) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = $i; $j < count($characters); $j++) {
            if ($characters[$i]["status"] != "Alive" && $characters[$j]["status"] == "Alive") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }

    for ($i = 0; $i < count($characters); $i++) {
        for ($j = $i; $j < count($characters); $j++) {
            if ($characters[$i]["status"] == "unknown" && $characters[$j]["status"] == "Dead") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}
function obCharacters($charactersJ)
{

    for ($i = 0; $i < count($charactersJ); $i++) {

        $characters[$i] = new Character($charactersJ[$i]['id'], $charactersJ[$i]['name'],
            $charactersJ[$i]['status'], $charactersJ[$i]['species'], $charactersJ[$i]['type'],
            $charactersJ[$i]['gender'], $charactersJ[$i]['origin'], $charactersJ[$i]['location'],
            $charactersJ[$i]['image'], $charactersJ[$i]['created'], $charactersJ[$i]['episodes']);
    }
    return $characters;
}

function obEpisodes($episodesJ){

    for ($i = 0; $i < count($episodesJ); $i++){

        $episodes[$i] = new Episodes($episodesJ[$i]['id'], $episodesJ[$i]['name'], $episodesJ[$i]['air_date'],
        $episodesJ[$i]['episode'], $episodesJ[$i]['created'], $episodesJ[$i]['characters']);
    }
return $episodes;
}

function obLocations($locationsJ){

    for ($i = 0; $i < count( $locationsJ); $i++){
        $locations[$i] = new Locations($locationsJ[$i]['id'], $locationsJ[$i]['name'], $locationsJ[$i]['type'],
            $locationsJ[$i]['dimension'], $locationsJ[$i]['created'], $locationsJ[$i]['residents']);
    }
    return $locations;
}




function mapping($characters, $episodes, $locations){
    $enames = Array();

    for ($i = 0; $i < count($characters);$i++) {

        for ($j = 0; $j < count($locations); $j++) {

            if ($characters[$i]->getOrigin() == $locations[$j]->getId() && $characters[$i]->getOrigin() != "0") {
                $characters[$i]->setOrigin($locations[$j]->getName());
            } else if ($characters[$i]->getOrigin() == "0") {
                $characters[$i]->setOrigin("Unknown");
            }
        }

        for ($j = 0; $j < count($locations); $j++){

            if ($characters[$i]->getLocation() == $locations[$j]->getId() && $characters[$i]->getLocation() != "0"){
                $characters[$i]->setLocation($locations[$j]->getName());
            } else if ($characters[$i]->getLocation() == "0") {
                $characters[$i]->getLocation("Unknown");
            }
        }

        for ($j = 0; $j < count($episodes); $j++){
            for ($k = 0; $k < count($characters[$i]->getEpisodes()); $k++){
                if (($characters[$i]->getEpisodes()[$k] == intval($episodes[$j]->getId())) &&$characters[$i]->getEpisodes()[$k] !== 0 ){
                    $enames[$k] = $episodes[$j]->getName();
                }else if($characters[$i]->getEpisodes()[$k] == 0){
                    $enames[$k] = "unknow";
                }
            }
        }
        $characters[$i] -> setEpisodes($enames);

    }
    return $characters;
}
function render($character) {
    //var_dump($character->getId());

    echo '<div class="col-md-4 col-sm-12 col-xs-12"><div class="card mb-4 box-shadow bg-light">';
    echo '<img class="card-img-top" src="'. $character->getImage() .'" alt="'.$character->getImage().'">';
    echo '<div class="card-body"><h5 class="card-title">'. $character->getName().'</h5>';
    $alertClass = "success";
    switch ($character->getStatus()) {
        case "Dead":
            $alertClass = "danger";
            break;
        case "unknown":
            $alertClass = "warning";
            break;
  }
    echo '<div class="alert alert-'.$alertClass.'" style="padding:0;" role="alert">'. $character->getStatus() .' - '. $character->getSpecies() .'</div>';
    echo '<form><div class="mb-3" style="margin-bottom:0!important;">';
    echo '<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Origin:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'.  $character->getOrigin() .'</div></div>';
    echo '<div class="mb-3"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Last known location:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'. $character->getLocation() .'</div></div></form>';
    echo '<div class="d-flex justify-content-between align-items-center"><div class="btn-group">';
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#characterModal_'.$character->getId().'">View episodes</button>';
    echo '<div class="modal fade" id="characterModal_'.$character->getId().'" tabindex="-1" aria-labelledby="characterModalLabel_'.$character->getId().'" aria-hidden="true">';
    echo '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
    echo '<h5 class="modal-title" id="characterModalLabel_'.$character->getId().'">Episodes list </h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>';
    //echo count($character->getEpisodes());
    echo '<div class="modal-body"><ol class="list-group">';

    foreach ($character->getEpisodes() as $episode => $a) {
        echo '<li class="list-group-item">'. $a .'</li>';
    }

    echo '</ol></div>';
    echo '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div></div>';
    echo '<small class="text-muted">'. $character->getCreated() .'</small></div></div></div></div>';
}
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $charactersJ = getSortedCharactersById($charactersJ);
            break;
        case "origin":
            $charactersJ = getSortedCharactersByOrigin($charactersJ);
            break;
        case "status":
            $charactersJ = getSortedCharactersByStatus($charactersJ);
            break;
    }
}

$characters = obCharacters($charactersJ);
$episodes = obEpisodes($episodesJ);
$locations = obLocations($locationsJ);

$charmapp = mapping($characters, $locations, $episodes);

?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="ejercicio1.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">

                <?php

                foreach ($charmapp as $i => $key) {
                    render($key);
                }

                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>
