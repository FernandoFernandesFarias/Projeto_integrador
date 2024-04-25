<?php

namespace core;

class Router
{

  private $controller = 'Home';
  private $method = 'index';
  private $params = '[]';

  public function dividirURL()
  {
    return explode('/', filter_var($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
  }

  public function __construct()
  {
    $url = $this->dividirURL();

    if (file_exists('controller/' . ucfirst($url[2]) . '.php')) {
      $this->controller = $url[2];
    }
    require_once 'controller/' . $this->controller . '.php';

    $this->controller = new $this->controller;

    if (isset($url[3])) {
      if (method_exists($this->controller, $url[3])) {
        $this->method = $url[3];
        unset($url[0]);
        unset($url[1]);
        unset($url[2]);
        unset($url[3]);
      } else {
        $this->method = 'erro';
      }
    }

    $this->params = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->params);
  }
}
