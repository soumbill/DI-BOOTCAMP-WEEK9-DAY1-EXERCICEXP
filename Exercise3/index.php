<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

try {

    // Init basic route
    $home_route = new Route('/', array('controller' => 'HomeController'));

    // Init route with dynamic placeholders
    // $home_dynamic_route = new Route(
    //     '/foo/{id}', 
    //     array('controller' => 'FooController', 'method'=>'load'),
    //     array('id' => '[0-9]+')
    // );

    // Add Route object(s) to RouteCollection object
    $routes = new RouteCollection();
    $routes->add('home_route', $home_route);
    // $routes->add('home_dynamic_route', $home_dynamic_route);

    // Init RequestContext object 
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());

    // Init UrlMatcher object 
    $matcher = new UrlMatcher($routes, $context);

    // Find the current route 
    $parameters = $matcher->match($context->getPathInfo());

    // How to generate a SEO URL 
    $generator = new UrlGenerator($routes, $context);
    // $url = $generator->generate('home_dynamic_route', array(
    //   'id' => 123,
    // ));

    // echo '<pre>';
    // print_r($parameters);
 
    echo '<h1>Hello World!</h1>';
    exit;

} catch(ResourceNotFoundException $e) {
    echo $e->getMessage();
}