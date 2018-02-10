<?php
echo $_SERVER['REQUEST_METHOD'];
///if(isset($_SERVER['REQUEST_URI'])) {
    $info = explode('/', trim($_SERVER['REQUEST_URI']));
   // echo $info;

    echo "<br>";
    print_r($info);

    echo "<br>";

    echo $_SERVER["REQUEST_URI"];
//}

//$request = explode('/',$_SERVER['PATH_INFO']);
//print_r($request);


?>