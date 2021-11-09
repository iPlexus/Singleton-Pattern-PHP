<?php
// Création de la class MyPdo
class MyPdo
{
    // attributs privés de la class
    private static $myPdo;
    private static $instance = null;

    // Constructeur privé qui initialise mon objet PDO
    private function __construct()
    {
        MyPdo::$instance = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8mb4', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    // Méthode publique qui détruit l'instance de notre objet à la fin de son utilisation
    public function __destruct()
    {
        MyPdo::$instance = null;
    }

    // Méthode statique qui permet de créer l'unique instance de ma class
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$myPdo = new MyPdo();
        }
        return self::$instance;
    }
}
?>