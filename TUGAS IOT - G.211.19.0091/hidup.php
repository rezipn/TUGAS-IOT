<?php
    require ("phpMQTT.php");

    $host   = "riset.revolusi-it.com";
    $port     = 1883;
    $username = "G.211.19.0091";
    $password = "";
    
    $topic = "iot/kendali";

    $message = @$_GET['message'];

    if (empty($message)) 
    {
        $message = "hidup";
    }

    $mqtt = new Bluerhinos\phpMQTT($host, $port, "ClientID".rand());

    if ($mqtt->connect(true, NULL, $username, $password)) 
    {
        $mqtt->publish($topic, $message, 0);
        $mqtt->close();
    }
    else
    {
        echo "Fail or time out\n";
    }

    echo "[$topic] mengirim message: $message";
?>