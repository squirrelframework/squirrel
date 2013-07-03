<?php

use Squirrel\Debugger\HttpDebugger;
use Squirrel\Autoloader\PsrAutoloader;
use Squirrel\Finder\CascadingFinder;
use Squirrel\Routing\Router;
use Squirrel\Routing\Route;
use Squirrel\Routing\Pattern;
use Squirrel\Context\Context;
// use Squirrel\Database\Mysql\Pdo\Database as MysqlPdoDatabase;
// use Squirrel\Database\Redis\Database as RedisDatabase;
use Squirrel\Framework\HttpKernel;
use Squirrel\Http\Request;

require __DIR__ . '/squirrel/autoloader.php';

$handler = new HttpDebugger();
$handler->register();

$finder = new CascadingFinder();
$finder->addRoot(__DIR__ . '/application/default-module');
$finder->addRoot(__DIR__ . '/application/blog-module');

$autoloader = new PsrAutoloader($finder, 'library');
$autoloader->register();

$router = new Router();
$router->add('default', new Route(new Pattern('/'), array('controller' => 'DefaultModule\Controller\DefaultController', 'action' => 'index')));

$context = new Context();
$context->set('finder', $finder);
$context->set('router', $router);
// $context->set('database-sql', new Squirrel\Database\Mysql\Pdo\Database('localhost', 'root', ''));
// $context->set('database-redis', new RedisDatabase());

$kernel = new HttpKernel();
$kernel->setContext($context);
$kernel->setEnvironment(HttpKernel::ENVIRONMENT_DEVELOPMENT);
$kernel->setTimezone('Europe/Paris');
$kernel->setLocale('fr_FR');

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
