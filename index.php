<?php
include "module/Presenter.class.php";
include "Response.class.php";
include "WSEvent.class.php";

$Response = new Response();
$Event = new WSEvent($Response);

$Presenter = new Presenter($Event);

//$Presenter->delete();
//$Presenter->create();
//$Presenter->update();

$Presenter->gets();

var_dump($Response->body);
?>