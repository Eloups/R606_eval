<?php

/**
 * Classe pour les interactions en base de données
 */
class Database
{
    /**
     * PDO MySQL
     * @var PDO
     */
    private PDO $pdo;

    /**
     * Contructeur de Database
     */
    public function __construct()
    {
        try {
            $url = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8mb4";
            $this->pdo = new PDO($url, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur lors de la connexion à la BDD : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Function to init database
     * @return void
     */
    public function initDatabase()
    {
        try {
            $this->pdo->prepare('CREATE TABLE IF NOT EXISTS db_table (id INT PRIMARY KEY AUTO_INCREMENT, text VARCHAR(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4')->execute();
        } catch (PDOException $e) {
            echo 'Erreur lors de l\'initialisation de la BDD : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Function to insert a text into database
     * @param string $text
     * @return void
     */
    public function insertText(string $text)
    {
        try {
            $this->pdo->prepare('INSERT INTO db_table (text) VALUES (:text)')->execute([':text' => $text]);
        } catch (PDOException $e) {
            echo 'Erreur lors de l\'insertion dans la BDD : ' . $e->getMessage();
            die();
        }
    }

    public function getAllTexts(): array
    {
        try {
            $data = $this->pdo->query('SELECT id,text FROM db_table')->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des textes dans la BDD : ' . $e->getMessage();
            die();
        }

        return $data;
    }
}