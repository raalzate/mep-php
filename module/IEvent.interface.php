<?php

interface IEvent 
{
	function onCreated();
	function onUpdated();
	function onDeleted();
	function onGets($array);
	function onError(Exception $e);

}
?>