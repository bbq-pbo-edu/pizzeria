<?php

class Pizza
{
    private array $toppings;
    private int $basePrice = 10;

    public function __construct(array $toppings)
    {
        $this->toppings = $toppings;
    }

    public function getPrice(): float
    {
        return $this->basePrice + count($this->toppings);
    }

    public function printInfo(): void
    {
        $pizzaCount = count($this->toppings);
        for ($i = 0; $i < $pizzaCount; $i++) {
            echo "{$this->toppings[$i]}";

            if ($i < $pizzaCount - 2) {
                echo ", ";
            }
            else if ($i < $pizzaCount - 1) {
                echo " und ";
            }
            else {
                echo " -> " . $this->getPrice() . " Euro\n";
            }
        }
    }
}