<?php
    $contents = $_POST['json'];
    file_put_contents("../resources/stations.json",  $contents);
    
    echo $contents;
?>
