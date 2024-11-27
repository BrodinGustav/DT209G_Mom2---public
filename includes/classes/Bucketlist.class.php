<?php

class Bucketlist
{
    //Properties
    private $db;    //Vid instans av klassen görs databasanslutning, lagras i propertyn. 
    private $name;
    private $description;
    private $priority;

    //Konstruktor
    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        //Kontroll databasanslutning
        if ($this->db->connect_error) {
            die("Anslutning misslyckades: " . $this->db->connect_error);
        }
    }



    //Metod för att lägga till i bucketlist
    public function addToBucketList(string $name, string $description, int $priority): bool
    {
        //Array som lagrar error-meddelanden
        $errors = [];

        if (!$this->setName($name)) {
            $errors[] = "Fältet 'Namn' får inte vara tomt.";
        }
        if (!$this->setDescription($description)) {
            $errors[] = "Fältet 'Beskrivning' måste vara ett positivt heltal.";
        }
        if (!$this->setPriority($priority)) {
            $errors[] = "Fältet 'Prioritet' måste vara ett positivt heltal.";
        }

        //Kontroll om fel
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
            return false;
        }

        //Lagra data till db
        $sql = "INSERT INTO mom2_bucketlist_items(name, description, priority)VALUES('" . $this->name . "', '" . $this->description .  "', " . $this->priority . ")";

        return $this->db->query($sql);
    }


    //Metod för att radera från bucketlist
    public function deleteFromBucketList(int $id): bool
    {

        //Förbered DELETE-frågan
        $stmt = $this->db->prepare("DELETE FROM mom2_bucketlist_items WHERE id =?");

        //Binder parametern till sql-frågan
        $stmt->bind_param("i", $id);

        //Kör statement och returnera resultat
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }



    //Metod för att hämta in bucketlist
    public function getBucketList(): array
    {
        //Array som lagrar data från databasen
        $items = [];


        // Kontrollera om tabellen finns
        $tableName = "mom2_bucketlist_items";
        $checkTableSql = "SHOW TABLES LIKE '$tableName';";
        $checkResult = $this->db->query($checkTableSql);

        if ($checkResult->num_rows === 0) {
            // Tabellen finns inte, returnera tom array
            return [];
        }

        //Om tabell finns, hämta data
        $sql = "SELECT * FROM mom2_bucketlist_items ORDER BY id;";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }

        return $items;
    }


    /** Setter & Getter med skydd mot mysqlinjections */
    public function setName(string $name): bool
    {
        if ($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        }
        return false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): bool
    {
        if ($description != "") {
            $this->description = $this->db->real_escape_string($description);
            return true;
        }
        return false;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setPriority(int $priority): bool
    {
        //Kontroll att priority sätts med positivt heltal
        if ($priority > 0) {
            $this->priority = $priority;
            return true;
        }

        return false;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    /** Destructor (Stänger databasanslutning) */
    function __destruct()
    {
        $this->db->close();
    }
}
