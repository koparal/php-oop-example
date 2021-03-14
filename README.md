## Description
Simple PHP OOP Example.

## Rules
1. The cabinet consists of 3 shelves and each shelf has a capacity of 20.
2.  Just one can of drink can be added or taken from the cabinet at the same time.
3.  The cabinet door can be open or closed.
3.  The cabinet can be empty, partially full or full statuses.
4.  The cabinet should be able to check the free space for each shelves. And when it is full, no more item can be added.
## Installation

```bash
git clone https://github.com/koparal/mobile-app-subscription-service.git
```

## Examples

Define a new Drinks Cabinet Object

```bash
$drinksCabinet = new DrinksCabinet(3, 20);

// Param 1 => Number of shelves
// Param 2 => Capacity of the shelf
```

Define a new item

```bash

$item = new Item(1, "Cola 33cl");

// Param 1 => ID
// Param 2 => Name
```

Add new item to drinks cabinet

```bash
$item = new Item(1, "Cola 33cl");

$drinksCabinet->add($item);
```

Take a item to drinks cabinet

```bash
$item = new Item(1, "Cola 33cl");

$drinksCabinet->take($item);
```

Check Drinks Cabinet Status

```bash
$drinksCabinet->getFriendlyStatus();
```

Check Cabinet Door Status

```bash
$drinksCabinet->getFriendlyDoorStatus();
```