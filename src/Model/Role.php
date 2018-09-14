<?php

namespace App\Model;

class Role 
{
    const NAME = "/^[a-z]{2,16}/";
    const VALUE = "/^[A-Z_]{2,16}/";

    private $value;
    private $name;
    private $id;    

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }
}