<?php


class DataFetch{

    public static function file_get_contents_curl($url){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }


}

//function file_get_contents_curl($url) {
//    $ch = curl_init();
//
//    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
//
//    $data = curl_exec($ch);
//    curl_close($ch);
//
//    return $data;
//}



?>