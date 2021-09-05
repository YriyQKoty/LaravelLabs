<?php

namespace App\Models;


class Recipe
{
    private $description;
    private $amount;
    private $type;

    public function __construct($desc, $amount,$type)
    {
        $this->description = $desc;
        $this->amount = $amount;
        $this->type = $type;
    }

    public function getDesc () {
        return $this->description;
    }

    public function getAmount () {
        return $this->amount;
    }

    public function getType () {
        return $this->type;
    }

}
