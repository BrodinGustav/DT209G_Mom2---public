<?php
$sitename = "BucketList";
$divider = " | ";

//Aktivera stöd för att inkludera klassfiler automatiskt
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

