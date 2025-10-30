<?php

class Customer
{
    private string $lastName;
    private string $firstName;
    private string $address;

    public function __construct(string $lastName, string $firstName, string $address)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->address = $address;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function makeOrder(array $toppingList): Order
    {
        $order = new Order($this);

        foreach($toppingList as $toppings) {
            $order->addPizza(new Pizza($toppings));
        }

        return $order;
    }
}