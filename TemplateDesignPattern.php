<?php

// En ingeniería de software, el patrón de método de la plantilla es un patrón de
// diseño de comportamiento que define el esqueleto de programa de un algoritmo en un método,
// llamado método de plantilla, el cual difiere algunos pasos a las subclases.
// Permite redefinir ciertos pasos seguros de un algoritmo sin cambiar la estructura del algoritmo

abstract class Taco
{
    public function make()
    {
        $this->addLemon()
            ->addTortilla()
            ->addPrimaryToppings();
    }

    protected function addTortilla()
    {
        echo 'Add onion' . PHP_EOL;
        return $this;
    }

    protected function addLemon()
    {
        echo 'Add lemon' . PHP_EOL;
        return $this;
    }

    abstract function addPrimaryToppings();
}

class TacoPastor extends Taco
{
    public function addPrimaryToppings()
    {
        echo 'Add pastor and pineapple';
    }
}

class TacoChicken extends Taco
{
    public function addPrimaryToppings()
    {
        echo 'Add chicken';
    }
}

class TacoVeggie extends Taco
{
    public function addPrimaryToppings()
    {
        echo 'Add lettuce and soja';
    }
}

$taco = new TacoPastor();
$taco->make();

$taco = new TacoChicken();
$taco->make();

$taco = new TacoVeggie();
$taco->make();