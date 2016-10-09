<?php
if(!function_exists('setFlash')){
    
    function setFlash($message, $type = "success"){
        $_SESSION['Flash']['type'] = $type;
        $_SESSION['Flash']['message'] = $message;
    }
    
}

if(!function_exists('flash')){
    
    function flash(){
        $html = "";
        if(isset($_SESSION['Flash'])){
            $html = "<div class='alert-{$_SESSION['Flash']['type']}'>{$_SESSION['Flash']['message']}</div>";
            unset($_SESSION['Flash']);
        }
        return $html;
    }
    
}


function validerReservation(){
    $reservation = [];
    $reservation['numero'] = $_POST['idVol'];
    $reservation['nom'] = $_POST['nom'];
    $reservation['prenom'] = $_POST['prenom'];
    $reservation['adresse'] = $_POST['adresse'];
    $reservation['mail'] = $_POST['mail'];
    $reservation['nbplaces'] = $_POST['nbvoyageurs'];
    
    return $reservation;
}

function ajouterPanier($reservation){
    if(!isset($_SESSION['reservations'])){
        $_SESSION['reservations'] = [];
    }
    
    $_SESSION['reservations'][uniqid() . '-' . $reservation['numero']] = $reservation;
}

function supprimerReservation($id){
    if(isset($_SESSION['reservations'][$id])){
        unset($_SESSION['reservations'][$id]);
        return true;
    }
    return false;
}

function getLaReservation(){
    return isset($_SESSION['reservations'][$_GET['numReservation']]) ? $_SESSION['reservations'][$_GET['numReservation']] : null;
}