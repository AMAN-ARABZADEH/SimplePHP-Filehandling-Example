<?php
class User {
    private $name;
    private $city;
    private $email;

    public function __construct($name, $email, $city) {
        $this->name = $name;
        $this->email = $email;
        $this->city = $city;
    }

    public function getName() {
        return $this->name;
    }

    public function getCity() {
        return $this->city;
    }

    public function getEmail() {
        return $this->email;
    }
}