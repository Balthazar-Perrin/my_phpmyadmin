<?php 

class Database {

public $name;
public $content;

function __construct($name, $content) {
    $this->name=$name;
    $this->content=$content;
}

}

?>