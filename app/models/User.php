<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {

use HasRole;

public static $rules = array(
    'username' => 'unique:users,username',
    'email' => 'email'
);
}
?>