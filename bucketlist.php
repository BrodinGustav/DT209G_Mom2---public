<?php include("includes/config.php"); ?>
<?php include("includes/head.php"); ?>


<body>
    <?php include("includes/mainmenu.php"); ?>

    <div class="main-section">

        <h1>Bucketlist</h1>
        <?php

        //Instansierar klassen
        $BucketList = new Bucketlist();


        //Kontrollera om formulär är postat för "lägga till-metod"
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $priority = (int)$_POST['priority'];   //Omvandlar till int

            //Kontroll om formulär är korrekt ifyllt vid postning
            if ($BucketList->addToBucketList($name, $description, $priority)) {
                echo "<p>Lagd till bucketlist!</p>";
            } else {
                echo "<p>Fel vid registrering till bucketlist </p>";
            }
        }



        //Kontroll om post skickat för radering
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            //Validerar och säkrar ID
            $id = intval($_POST['id']);

            //Kontrolll om post raderad
            if ($BucketList->deleteFromBucketList($id)) {
                echo "Objektet har raderats.";
            } else {
                echo "Fel vid borttagning.";
            }
        }


        ?>


        <!--Formulär-->
        <div class="add-section">
            <form method="POST" action="bucketlist.php" autocomplete="off">

                <label for="name">Titel:</label>
                <input type="text" id="name" name="name" placeholder="Titel">
                <label for="description">Beskrivning:</label>
                <input type="text" id="description" name="description" placeholder="Beskrivning">
                <label for="priority">Prio:</label>
                <input type="text" id="priority" name="priority" placeholder="Prioritering">
                <button type="submit">Lägg till</button>

            </form>
        </div>




        <div class="show-bucket-list-section">

            <?php


            //Hämta data från databas             
            $Bucketslist_items = $BucketList->getBucketList();

            //Kontroll om datan är tom
            if (count($Bucketslist_items) <= 0) {
                echo "Din bucketlist är tom.";
            } else {

                echo "<ul>";
                //Loopar igenom datan   
                foreach ($Bucketslist_items as $bucket) {

                    // Konvertera priority till ett heltal
                    $priority = (int)$bucket['priority'];

                    //Deklarerar id-variabel för DELETE-crud
                    $id = $bucket['id'];

                    //Skriver ut datan
                    echo "<li>"
                        . "<strong>Titel</strong> <br> " . $bucket['name'] . "<br>" . "<br>"
                        . "<strong>Beskrivning</strong> <br> " . $bucket['description'] . "<br>" . "<br>"
                        . "<strong>Skapad</strong> <br> " . $bucket['created_at'] . "<br>" . " Prioritet: "
                        . $priority . "<br>" . "-----------------------------------"

                        //lägger till knapp för radering via id vid utskrift
                        . " <form method='POST' action='bucketlist.php' style='display:inline;'>"
                        . "<input type='hidden' name='id' value='" . $id . "'>"
                        . "<button type='submit'>Ta bort</button>" . "<br>" . "-----------------------------------"
                        . "</form>"
                        . "</li>";
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>

    <?php include("includes/footer.php") ?>

</body>

</html>