<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/11/21
 * Time: 11:27 AM
 */

class Student
{
    public $name;
    protected $age;
    private $sex;

    function __construct($name, $age, $sex)
    {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }
}

$prodClass = new ReflectionClass('Student');
Reflection::export($prodClass);