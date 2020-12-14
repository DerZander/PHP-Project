<?php


namespace App\Users;


use App\Core\AbstractModel;

class UserModel extends AbstractModel
{
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $birthday;
    public $email;
    public $street;
    public $housenumber;
    public $postcode;
    public $city;
    public $password;
    public $superuser;

}