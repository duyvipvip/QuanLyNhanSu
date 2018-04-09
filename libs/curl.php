<?php
class curl {
    public static function POST($url, $data){

        $token = 'fefefe';
        //Initiate cURL.
        $ch = curl_init($url);

        //Encode the array into JSON.
        $jsonDataEncoded = json_encode($data);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'x-access-token:'.$token)); 

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Execute the request
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;

    }
}
?>