<?php
use Phalcon\Mvc\Model;

class Users extends Model
{
    public function initialize() {
        $this->setSource('create_users_table');
    }
public $id;
public $name;
public $email;
}