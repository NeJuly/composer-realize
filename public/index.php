<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use App\HelloWorld;
use function DI\create;
use Relay\Relay;
use Zend\Diactoros\ServerRequestFactory;
use function FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
//Enable or disable the use of autowiring to guess injections.
$containerBuilder->useAutowiring(false);
//Enable or disable the use of annotations to guess injections.
$containerBuilder->useAnnotations(false);
//Add definitions to the container.
$containerBuilder->addDefinitions([
    //Helper for defining an object.
//    HelloWorld::class => create(HelloWorld::class)
    HelloWorld::class => create(HelloWorld::class)
                        ->constructor(\DI\get('Foo')),
                        'Foo' => 'bar'
]);
//Build and return a container.
$container = $containerBuilder->build();

$routes = simpleDispatcher(function(RouteCollector $r){
    $r->get('/hello',HelloWorld::class);
});
$middlewareQueue[] = new \Middlewares\FastRoute($routes);
$middlewareQueue[] = new \Middlewares\RequestHandler($container);


$requestHandler = new  Relay($middlewareQueue);
$requestHandler->handle(ServerRequestFactory::fromGlobals());


//Returns an entry(入口) of the container by its name.
$helloWorld = $container->get(HelloWorld::class);
$helloWorld->helloTest();