<?php

/**
 * El patrón Decorator responde a la necesidad de añadir dinámicamente funcionalidad a un Objeto.
 * Esto nos permite no tener que crear sucesivas clases que hereden de la primera incorporando la nueva funcionalidad,
 * sino otras que la implementan y se asocian a la primera.
 */

/**
 * Ejemplos reales: un constructor de interfaces visuales
 */
interface PizzaInterface
{
    public function getPrice();

    public function getDescription();
}

class SimplePizza implements PizzaInterface
{
    public function getPrice()
    {
        return 99;
    }

    public function getDescription()
    {
        return "Pizza with cheese";
    }
}

class PizzaWithPepperoni implements PizzaInterface
{
    protected $website;

    public function __construct(PizzaInterface $website)
    {
        $this->website = $website;
    }

    public function getPrice()
    {
        return 30 + $this->website->getPrice();
    }

    public function getDescription()
    {
        return $this->website->getDescription() . ", and pepperoni";
    }
}

class PizzaWithExtraCheese implements PizzaInterface
{
    protected $website;

    public function __construct(PizzaInterface $website)
    {
        $this->website = $website;
    }

    public function getPrice()
    {
        return 50 + $this->website->getPrice();
    }

    public function getDescription()
    {
        return $this->website->getDescription() . ", with extra cheese";
    }
}


class PizzaWithMushroom implements PizzaInterface
{
    private $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getPrice()
    {
        return 20 + $this->pizza->getPrice();
    }

    public function getDescription()
    {
        return $this->pizza->getDescription() . ', with mushrooms';
    }
}

$pizza = new PizzaWithExtraCheese(new PizzaWithMushroom(new SimplePizza()));
echo 'Pizza price: ' . $pizza->getPrice();
echo PHP_EOL;
echo 'Description: ' . $pizza->getDescription();
echo PHP_EOL;