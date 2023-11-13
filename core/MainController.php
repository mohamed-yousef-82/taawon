<?php

class MainController
{
    use lang;
    protected $controller;
    protected $action;
    protected $params;
    protected $scope;
    
    protected $data = [];

<<<<<<< HEAD
=======
    // public function __construct(){
    //     $_SESSION["l"] = $this->setLang();
    //     $lang = $_SESSION["l"];
    // }
>>>>>>> 6fb3dc4 (first taawon)
    public function notFoundAction()
    {
        $this->view();
    }

    public function setController($controllerName)
    {
        $this->controller = $controllerName;

    }
    public function setData($data)
    {
        $this->data = $data;

    }
    public function setScope($scope)
    {
        $this->scope = $scope;

    }
    public function setAction($actionName)
    {
        $this->action = $actionName;
    }


    public function setParams($params)
    {
        $this->params = $params;
  
    }
<<<<<<< HEAD
    public function switchLang()
    {
        if (!isset($_SESSION["lang"])) {
            $_SESSION["lang"] = "AR";
        }
        
        if (isset($_POST["lang"])) {
            switch ($_SESSION["lang"]) {
                  case "AR":
                  $_SESSION["lang"] = "EN";
                  break;
                  case "EN":
                  $_SESSION["lang"] = "AR";
                  break;
                  default:
                  $_SESSION["lang"] = "AR";
              }
            //   var_dump($_SESSION["lang"]);
            // if($_SESSION["lang"] == "AR"){
            //     $_SESSION["lang"] = "EN";
            // }else if($_SESSION["lang"] == "EN"){
            //     $_SESSION["lang"] = "AR";
            // }
        }


      

    }
    public function setLang(){
=======
    public function setLang()
    {
        if(!isset($_SESSION["lang"])){
            $_SESSION["lang"] = "AR";
        }
        

        if (isset($_POST["lang"])) {
            $_SESSION["lang"] = $_POST["lang"];
        }


>>>>>>> 6fb3dc4 (first taawon)
        $lang = $this->lang;
        foreach ($lang as $key => $value) {
            $lang[$key] = $lang[$key][$_SESSION["lang"]];
            
        }
        return $lang;
<<<<<<< HEAD
=======
      

>>>>>>> 6fb3dc4 (first taawon)
    }

    protected function layoutContent()
    {
        $lang = $this->setLang();
        ob_start();
        include_once VIEWS_PATH . $this->scope . DS . "layouts" . DS . "main.php";
        return ob_get_clean();
    }
    protected function renderOnlyView($info)
    {
        $lang = $this->setLang();
<<<<<<< HEAD

        $LN = strtolower($_SESSION["lang"]);
        $data = $this->data;
=======
        $LN = strtolower($_SESSION["lang"]);

        // $lang = $this->setLang();
        $data = $this->data;
       
>>>>>>> 6fb3dc4 (first taawon)
        $view = VIEWS_PATH . $this->scope . DS . $this->controller . DS . $this->action . '.php';
      
        if ($this->action == Router::NOT_FOUND_ACTION || !file_exists($view)) {
            $view = VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
        }
        foreach ($info as $key => $value) {
            echo $$key = $value;
        }
        ob_start();
        include_once $view;
        return ob_get_clean();
    }
    public function view($info = [])
    {
<<<<<<< HEAD
        $this->switchLang();
=======
>>>>>>> 6fb3dc4 (first taawon)
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($info);
        echo str_replace("{{content}}", $viewContent, $layoutContent);
    }
}