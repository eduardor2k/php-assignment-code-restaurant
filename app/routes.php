<?php
// we set all the available routes
$route = new \Framework\Router\Route();
// \/(?P<controller>[a-z]+)?\/?(?P<action>[a-z]+)?\/?(?P<id>[0-9]+)?\/?
// This regular expression wil match anything like
// /
// /adress
// /adress/delete/5
// /adress/add/7
$route->setRoute("/\\/(?P<controller>[a-z]+)\\/?(?P<action>[a-z]+)?\\/?(?P<id>[0-9]+)?\\/?/");

return array(
    $route
);