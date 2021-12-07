<?php
    require_once("Controllers/Histogramme.php");
    $unController = new \Controllers\Histogramme();

    $unHisto = $unController->selectCountProductsByCategories();

    require_once("Views/view_histogramme.php");
