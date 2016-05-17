<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/Response.php';
require_once __DIR__.'/WSEvent.php';


$Response = new Response();
$Event = new WSEvent($Response);

$Presenter = new Module\Presenter($Event);

//$Presenter->delete();
//$Presenter->create();
//$Presenter->update();

$Presenter->create();

var_dump($Response->body);
?>