<?php
session_start();
require "utils/fonctions.php";
require "modele/Model.php";

// Routing
if(!isset($_REQUEST['action'])){
    $action = 'accueil';
}else{
    $action = $_REQUEST['action'];
}

ob_start();

switch($action){
    
    case 'accueil':
        
        require "vues/v_accueil.php";
        break;
    
    case 'voirVols':
        $vols = Model::getInstance()->getLesVols();
        require "vues/v_catalogue.php";
        break;
    
    case 'reserver':
        $idVol = $_GET['id'];
        require "vues/v_reserver.php";
        break;
    
    case 'reserverVol':
        $reservation = validerReservation();
        $valide = Model::getInstance()->reserverVol($reservation);
        if(is_array($valide)){
            $message = "Une erreur est survenue<ul>";
            foreach($valide as $error){
                $message .= "<li>" . $error . "</li>";
            }
            $message .= "</ul>";
            setFlash($message, 'error');
            header('location:index.php?action=reserver&id=' . $_POST['idVol']);
            die();
        }
        
        ajouterPanier($reservation);
        setFlash("La réservation pour le vol n°{$reservation['numero']} est confirmée pour le client {$reservation['nom']} {$reservation['prenom']}");
        header('location:index.php');
        die();
        break;
        
    case 'suppReservation':
        if(supprimerReservation($_GET['id'])){
            setFlash("La réservation " . $_GET['id'] . " a bien été supprimée");
        }else{
            setFlash("La réservation " . $_GET['id'] . " n'existe pas", "error");
        }
        header('location:index.php?action=voirReservations');
        die();
        break;
        
    case 'voirReservations':
        $reservations = isset($_SESSION['reservations']) ? $_SESSION['reservations'] : [] ;
        require "vues/v_voirReservations.php";
        break;

    case 'pdfReservation':
        $reservation = getLaReservation();
        require "vues/v_pdfReservation.php";
        creerPDFReservation($reservation);
        break;
    
    default:
        require "vues/v_404.php";
        break;
    
}

$content = ob_get_clean();
if($action !== "pdfReservation"){
    require "vues/v_entete.php";
}
    echo $content;
if($action !== "pdfReservation"){
    require "vues/v_pied.php";
}
