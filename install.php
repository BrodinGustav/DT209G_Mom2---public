<?php
include("includes/config.php");

//Databasanslutning
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

//Om problem vid anslutning så stängs allt ner
if ($db->connect_error) {
   die("Anslutning misslyckades: " . $db->connect_error);
}

//Skapa tabell
$sql =
   "DROP TABLE IF EXISTS mom2_bucketlist_items;
   CREATE TABLE mom2_bucketlist_items(
   id INT(11) PRIMARY KEY AUTO_INCREMENT,
   name varchar(64) NOT NULL,
   description text(255) NOT NULL,
   priority int(10) NOT NULL,
   created_at timestamp NULL DEFAULT current_timestamp()
);";

//Skicka sql-fråga till server
if ($db->multi_query($sql)) {
   echo "Tabell skapad ok!";
} else {
   echo "Fel vid skapande av tabell.";
}
