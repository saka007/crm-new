<?php
function fetchData($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                            'Content-Type: application/json',
                                            'Connection: Keep-Alive'
                                            ));
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("Expect:  "));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $result = curl_exec($ch); // run the whole process
        return $result;
    }

    // Define Variables here 
    $username = 'yusuf_niyala';
    $url = [];
    $videoType = [];

    // Function Calling
    $result = fetchData("https://www.instagram.com/yusuf_niyala/?__a=1");
    print_r($result);
    die();

?>