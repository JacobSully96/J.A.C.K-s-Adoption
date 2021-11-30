<?php

class configuration
{
    protected $local = true;
    protected $username = 'root';
    protected $useraccount = '~ics325su2115';
    protected $password = "";
    protected $site = 'localhost';
//    protected $db = "site2";
    protected $db = "mySite";
    protected $docRoot = "";
    protected $root = "";

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __construct()
    {
        $root = $_SERVER["DOCUMENT_ROOT"];
        $docRoot = "http://" . $_SERVER['HTTP_HOST'];
        $userAccount = $this->useraccount;

        if($this->local == false){
            $root = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
            $docRoot = "http://" . $_SERVER['HTTP_HOST']. "/" . $userAccount . "/";
            $this->username = "ics325su2115";
            $this->password = "fxth";
        }

        $this->root = $root;
        $this->docRoot = $docRoot;
    }
}
