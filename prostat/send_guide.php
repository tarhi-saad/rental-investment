<?php
/**
 * Tunnel Prostat API.
 *
 * Ce fichier envois les simulations vers l'API Prostat pour les traités.
 *
 * PHP version 5
 *
 * @package Prostat
 * @author Younes Adounis <y.adounis@gmail.com>
 * @version 1.0
 */
session_start();

if(isset($_POST['tel']) && !empty($_POST['tel']) && !empty($_POST)) {
    // Prostat
    $apikey = 'y7B3Ui3W4j7z51RrYbcr686T8sE3SaJ0';
    $apiurl = 'http://web.prostats.fr/api/external/fiches';
    // Get Cookie value
    $Prostat['utm_source']      = (isset($_COOKIE['prostat_utm_source'])) ? urldecode($_COOKIE['prostat_utm_source']) : null;
    $Prostat['utm_campaign']    = (isset($_COOKIE['prostat_utm_campaign'])) ? urldecode($_COOKIE['prostat_utm_campaign']) : null;
    $Prostat['gclid']           = (isset($_COOKIE['prostat_gclid'])) ? urldecode($_COOKIE['prostat_gclid']) : null;
    $Prostat['prostat_referer'] = (isset($_COOKIE['prostat_referer'])) ? urldecode($_COOKIE['prostat_referer']) : null;
    $Prostat['prostat_nfps']    = (isset($_COOKIE['prostat_nfps'])) ? urldecode($_COOKIE['prostat_nfps']) : null;
    $Prostat['utm_term']        = (isset($_COOKIE['prostat_utm_term'])) ? urldecode($_COOKIE['prostat_utm_term']) : null;
    // Form values
    $fields = array(
        'apikey'         => strip_tags($apikey),
        'telnumber'      => strip_tags($_POST['tel']),
        'type_id'        => trim($_POST['guide']),
        'user_ip'        => $_SERVER['REMOTE_ADDR'],
        'utm_source'     => (isset($Prostat['utm_source'])) ? $Prostat['utm_source'] : '',
        'utm_campaign'   => (isset($Prostat['utm_campaign'])) ? $Prostat['utm_campaign'] : '',
        'utm_term'       => (isset($Prostat['utm_term'])) ? $Prostat['utm_term'] : '',
        'gclid'          => (isset($Prostat['gclid'])) ? $Prostat['gclid'] : '',
        'referral'       => (isset($Prostat['prostat_referer'])) ? $Prostat['prostat_referer'] : '',
        'nfps'           => (isset($Prostat['prostat_nfps'])) ? $Prostat['prostat_nfps'] : '',
    );
    $fields_string = '';
    foreach($fields as $key => $value) {
        $fields_string .= $key . '=' . urlencode($value) . '&';
    }
    rtrim($fields_string, '&');
    // Send values to Prostat API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiurl);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);
    // Check API result
    if(isset($result->status) && $result->status != "200") {
        header("Location: /");
        die();
    }
    // Delete Cookies
    setcookie('prostat_gclid', '', time() - 36000, "/");
    setcookie('prostat_utm_source', '', time() - 36000, "/");
    setcookie('prostat_utm_campaign', '', time() - 36000, "/");
    setcookie('prostat_utm_source', '', time() - 36000, "/");
    setcookie('prostat_referer', '', time() - 36000, "/");
    setcookie('prostat_nfps', '', time() - 36000, "/");
}
?>
