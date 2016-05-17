<?php

namespace Module;

abstract class AbsEvent 
{
    abstract protected function onError(\Exception $e);

	protected function onCreated() {}
	protected function onUpdated() {}
	protected function onDeleted() {}
	protected function onGets($array) {}

}
?>