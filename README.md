# MEP - PHP

En esta ocasión he realizado un simple patrón que involucre los modelos, los eventos y un presentador de eventos, el esfuerzo esta para estructurar un proyecto basándose en inyección de dependencia, principio de responsabilidad única y principio de sustitución de Liskov. El objetivo es desacoplar lógica del negocio de cualquier aplicación en PHP y modular el proyecto para su reutilización. 
La estructura está basada en módulos, debe contener la siguiente estructura de carpetas: 

![Estrucutra de Caperta](https://raw.githubusercontent.com/raalzate/mep-php/master/images/carpetas.png)

### AbsEvent
Es un contenedor de eventos para definir los suceso dentro del presentador, en este se debe colocar los eventos abstractos que son necesarios en la implementación y los eventos de activación que no son necesaria implementarlos. El ejemplo es:

``` 
abstract class AbsEvent 
{
	abstract protected function onError(\Exception $e); //debe implementarla 

	protected function onCreated() {}
	protected function onUpdated() {}
	protected function onDeleted() {}
	protected function onGets($array) {}
}
```
### IPresenter

Es una interfaz que la contrata el Presentador, en este caso solo los métodos de la interfaz podrá ejercer acción de los eventos públicos de la clase. Se recomienda que solo los métodos de la interfaz sea públicos, el resto privados.  

### Model

El Modelo un contendedor de métodos para acceso a datos, el modelo permite la interacción con la base de datos. Se recomienda que los métodos sean métodos de clase (public static), con el propósito de llevar única responsabilidad y también cerrado a cambios. 

### Presenter

El Presentador, es el encargado de llevar la responsabilidad del modulo, gestiona los eventos o sucesos dentro del control, se debe notificar simple de cada acción realizada. Un ejemplo de ello es:

``` 
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
    		$e = new \Exception("Fallo el insert");
    		$this->IEvent->onError($e);
    	}
    }
}
```

### Extensión de Evento Inyector

Para realiza la implementación debemos realizar una inyección de dependecia al presentador, utilizamos la clase **AbsEvent** para obtener los eventos, pero antes debemos extenderla y sobrescribir los eventos que necesitamos, luego debemos inyectar un objeto que transporte información o que nos determine los estados de los eventos, en este caso vamos a utilizar un manejador de respuesta, el ejemplo es:

```
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
} 	
```

### Implementación

Ahora este es el ultimo paso, la ejecución del Demo:

```
$Response = new Response();
$Event = new WSEvent($Response);//inyection response

$Presenter = new Module\Presenter($Event);//inyection event

$Presenter->create(); //excecute action

var_dump($Response->body); //print response body 

```
### Instalación

Para instalarlo se debe ejecutar compuser.

```
$ composer install
```



