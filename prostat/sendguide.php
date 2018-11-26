<?php
// Prostat
include_once 'send_guide.php';

/* Short and sweet */
define( 'SHORTINIT', true );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

function returnResponse($status,$message){
    $response = new stdClass();
    $response->success = $status;
    $response->message= $message;
    echo json_encode($response);
    exit;
}

function returnFile($file){
    if (file_exists("guides/".$file)) {
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename='".end(explode("/", $file))."'");
        readfile( "guides/".$file);
        exit;
    }
}

function getFileName($guide){
     switch($guide){
            case "pinel":
                $file = "guide-pinel.pdf";
                break;
            case "lmnp":
                $file = "guide-lmnp.pdf";
                break;
            case "tourisme":
                $file = "investir-en-residence-tourisme.pdf";
                break;
            case "etudiant":
                $file = "investir-en-residence-etudiante.pdf";
                break;
        }
        return $file;
}

function processGuide($guide,$isPost,$tel){
    /*
    $response = file_get_contents($url);
    $response = json_decode($response);
    $file;
    */
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT * FROM wp_guide where tel="'.$tel.'" AND guide="'.$guide.'"', OBJECT );
    $response = new stdClass();

    if(count($results) == 0){

        $wpdb->insert(
                'wp_guide',
                array(
                        'guide' => $guide,
                        'tel' => $tel,
                        'status'=>0
                ),
                array(
                        '%s',
                        '%s',
                        '%d'
                )
        );


        $url = "http://www.infitel.fr/integrate/postsupport.php";
        $inputKey = "pOth2Fowf4impH2aC0wys1Am";
        $inputPass = "vid0gi4ud6yaS1Ad8chUl4on";
        $telnumber = $tel;
        $inputOrigine = "";

        switch($guide){
            case "pinel":
                $inputOrigine = "guidepinel";
                break;
            case "lmnp":
                $inputOrigine = "lmnp";
                break;
            case "tourisme":
                $inputOrigine = "investirtourisme";
                break;
            case "etudiant":
                $inputOrigine = "investiretudiant";
                break;
        }

        $fields = array(
            'inputOrigine' => urlencode($inputOrigine),
            'inputKey' => urlencode($inputKey),
            'inputPass' => urlencode($inputPass),
            'telnumber' => urlencode($telnumber),
        );


        $fields_string = "";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);


    }

    if(isset($result) && $result->status == "ok"){
        if(isset($result->simulationResult) && isset($result->simulationResult->simid)){
            $response->simid =  $result->simulationResult->simid;
        }
    }

    $response->success = true;

    if($isPost){
        echo json_encode($response);
        exit;
    }else {
       $file = getFileName($guide);
       returnFile($file);
    }
}

if(isset($_POST["guide"]) && isset($_POST["tel"])){
    $guide = trim($_POST["guide"]);
    $tel = trim($_POST["tel"]);
    processGuide($guide,true,$tel);
}
if(isset($_GET["guide"]) && isset($_GET["tel"]) ){
    $guide = trim($_GET["guide"]);
    $tel = trim($_GET["tel"]);
    processGuide($guide,false,$tel);
}
