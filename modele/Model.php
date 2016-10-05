<?php
/**
 * Connexion avec une base de donnée MySQL
 */
class Model {


    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private static $_instance;
    private $db;
    
    public function __construct($db_name, $db_user, $db_pass, $db_host){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }
    
    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new Model('air_azur', 'root', '', 'localhost');
        }
     
        return self::$_instance;
    }
    
    public function getDb(){
        if($this->db === null){
            $this->db = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
            $this->db->exec('SET NAMES utf8');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return $this->db;
    }
    
    public function getLesVols(){
        $db = $this->getDb();
        $sql = $db->query("SELECT a1.nom as depart_nom, a2.nom as arrivee_nom, a1.pays as depart_pays, a2.pays as arrivee_pays, date_depart, date_arrivee, prix, places, numero  FROM aeroports_vols "
                . "LEFT JOIN vols ON vols.numero = aeroports_vols.num_vol "
                . "LEFT JOIN aeroports a1 ON aeroports_vols.depart_id = a1.id "
                . "LEFT JOIN aeroports a2 ON aeroports_vols.arrivee_id = a2.id");
        return $sql->fetchAll();
    }
    
    public function reserverVol($reservation){
        $errors = [];
        if(empty($reservation['numero']) || empty($reservation['nom']) || empty($reservation['prenom']) || empty($reservation['adresse']) || empty($reservation['mail']) || empty($reservation['nbplaces'])){
            $errors[] = "Les champs ne peuvent être vides";
        }
        if(!filter_var($reservation['mail'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "Ce n'est pas un email valide";
        }
        if(!is_numeric($reservation['nbplaces'])){
            $errors[] = "Nombre de places incorrects";
        }
        
        if(!empty($errors)){
            return $errors;
        }
        
        
        
        $db = $this->getDb();
        $sql = $db->prepare("INSERT INTO reservation SET numero=:num, nom=:nom, prenom=:prenom, adresse=:adresse, mail=:mail, nb_places=:nbplaces");
        $sql->execute(['num' => $reservation['numero'], 'nom' => $reservation['nom'], 'prenom' => $reservation['prenom'], 'adresse' => $reservation['adresse'], 'mail' => $reservation['mail'], 'nbplaces' => $reservation['nbplaces']]);
        return true;
    }
    
}
