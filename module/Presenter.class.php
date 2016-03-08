<?php
include "IPresenter.interface.php";
include "IEvent.interface.php";
include "Model.class.php";


class Presenter implements IPresenter 
{
	private $IEvent; 

	function __construct($event)
    {
       $this->IEvent = $event;
    }

    function create()
    {
    	echo "action create<br>";
    	if(Model::insert()) {
    		$this->IEvent->onCreated();//notifica
    	} else {
    		$e = new Exception("Fallo el insert");
    		$this->IEvent->onError($e);
    	}
    }

	function update()
	{
		echo "action update<br>";
		if(Model::update()) {
			$this->IEvent->onUpdated();//notifica
		}
	}

	function delete()
	{
		echo "action delete<br>";
		if(Model::remove()) {
			$this->IEvent->onDeleted();//notifica
		}
	}

	function gets()
	{
		echo "action gets<br>";
		if($gets = Model::gets()) {
			$this->IEvent->onGets($gets);//notifica
		}
	}
}

?>