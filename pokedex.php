<?php
require 'vendor/autoload.php';
include 'header.php';
include 'TraitAndService/GetDetail.php';
$i = 0;
$url = 'https://pokeapi.co/api/v2/pokemon/';
if (isset ($_GET['page'])) {
    $url .= $_GET['page'];
}


$fullCall = file_get_contents($url);
$pkmnList = json_decode($fullCall, true);
?>

    <div class="container-fluid position-relative">
        <a> </a>
        <a> </a>
        <div class="row">
            <div class="col-1 "></div>
            <div class="col-10">

                <div class="row">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="row gx-3">
                            <?php
                            dump($pkmnList);


                            foreach ($pkmnList

                                     as $result => $khey) {

                                if ($result === 'next') {

                                    $rest = substr($khey, 34); ?>
                                            <div <?php if($khey == null){echo 'class="d-none"';} ?>>
                                        <a style="right:10px; top:40vh;" class="position-fixed" href="pokedex.php?page=<?php echo $rest ?>"><span class="nextPreviousArrow"><i class="fas fa-angle-right"></i></span></a>
                                            </div>

                                <?php }
                                if ($result === 'previous') {
                                    $rest = substr($khey, 34); ?>
                            <div <?php if($khey == null){echo 'class="d-none"';} ?>>
                                        <a  style="left:10px; top:40vh;" class="position-fixed" href="pokedex.php?page=<?php echo $rest ?>"><span class="nextPreviousArrow"><i class="fas fa-angle-left"></i></span></a>
                            </div>

                                <?php } ?>


                                <?php
                                if ($result === 'results') {
                                    foreach ($khey

                                             as $item) {
                                        ?>
                                        <div class="col-4 mb-3">
                                            <div class="card  shadow">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src= <?php $var = new GetDetail();
                                                        $a = $var->recupDetail($item['url']);
                                                        $img = $a['sprites']['other']['official-artwork']['front_default'];
                                                        echo $img; ?>
                                                             class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 style="text-transform: capitalize;"
                                                                class="card-title"> <?php echo $item['name'] ?></h5>
                                                            <p class="card-text">
                                                            </p>
                                                            <p class="card-text"><small class="text-muted">Last updated
                                                                    3 mins
                                                                    ago</small></p>
                                                            <a class="btn btn-info"> View Detail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }

                                }
                            } ?>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-1"></div>
        </div>
    </div>
<?php

include 'footer.php';