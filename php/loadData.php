<?php
    for ($i = 0; $i < count($data["array"]); $i++) {
	$temp = loadData($data["array"][$i]["fileLocation"] . $fileName);
        $data["array"][$i]["data"] = $temp;
    }
?>

    <script>
        nuData = <?php echo json_encode($data); ?>;
        output("Successfully loaded file: " + <?php echo json_encode($fileName); ?> );
        keepUp(nuData);
    </script>
    
<?php    
    function loadData($path) {
            $currentData = file_get_contents($path);
            return readData($currentData);
    }
    
    function readData($haystack) {
            $datesArray=array();
            $speedsArray=array();
            $dirsArray=array();

            $count = substr_count($haystack, SDR);
            $pos = 0;
            
            $heightsArray = readRow($haystack, H);
            
            for ($i = 0; $i < $count; $i = $i + 1) {
                    $pos = stripos($haystack, SDR);
                    $haystack = substr($haystack, $pos+3);
                    
                    $datesArray[$i] = strtok($haystack, " ");
                    $speedsArray[$i] = readRow($haystack, VCL);
                    $dirsArray[$i] = readRow($haystack, DCL);
            }
            
            $myData = array(
                    'heights' => $heightsArray,
                    'dates' => $datesArray,
                    'speeds' => $speedsArray,
                    'directions' => $dirsArray,
                    );
            
            return $myData;
    }

    function readRow($searchString, $flag) {
            $startPos = stripos($searchString, $flag);
            $line = strtok(substr($searchString, $startPos+3), "\r");
            $myArray = str_split($line, 6);
            unset($myArray[0]);
            return $myArray;
    }
?>