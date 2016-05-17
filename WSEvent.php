<?php


class WSEvent extends Module\AbsEvent 
{
	private $Response;

	function __construct($Response)
    {
       $this->Response = $Response;
    }

	public function onCreated()
	{
		echo "onCreated";
		$this->Response->status = 200;
		$this->Response->body = "OK";
	}

	public function onUpdated()
	{
		echo "onUpdated";
		$this->Response->status = 200;
		$this->Response->body = "OK";
	}

	public function onDeleted()
	{
		echo "onDeleted";
		$this->Response->status = 200;
		$this->Response->body = "OK";
	}


	public function onError(Exception $e)
	{
		echo $e;
		echo "<br>";
		$this->Response->status = 500;
		$this->Response->body = "Fail";
	}

	public function onGets($array)
	{
		echo "onGets";
		$this->Response->status = 200;
		$this->Response->body = json_encode($array);
	}

}

?>