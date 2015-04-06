<?php
    $contents = $_POST['json'];
    file_put_contents("../resources/settings.json",  $contents);
    
    echo $contents;
?>
