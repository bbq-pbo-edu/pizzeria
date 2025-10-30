<?php

class Order
{
    private Customer $customer;
    private array $orderedPizzas = [];

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addPizza(Pizza $pizza): void
    {
        $this->orderedPizzas[] = $pizza;
    }

    public function printReceipt(): void
    {
        echo "Name {$this->customer->getFirstName()} {$this->customer->getLastName()}\n";
        echo "{$this->customer->getAddress()}\n";
        echo "Pizzen " . count($this->orderedPizzas) . "\n";

        foreach($this->orderedPizzas as $index => $orderedPizza) {
            echo "Nr. " .  ($index + 1) . " ";
            $orderedPizza->printInfo();
        }

        echo "Summe {$this->getSum()} Euro";
    }

    public function getSum(): float
    {
        $sum = 0;

        foreach($this->orderedPizzas as $orderedPizza) {
            $sum += $orderedPizza->getPrice();
        }

        return $sum;
    }
}