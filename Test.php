<?php

// Include classes
require_once "Classes/DrinksCabinet.php";
require_once "Classes/Item.php";

// Init DrinksCabinet Object
$drinksCabinet = new DrinksCabinet(3, 20);

// Define item
$item = new Item(1, "Cola 33cl");

echo "Adding before status (One Item) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

// Adding one item
if ($drinksCabinet->checkValidItem($item)) {
    $drinksCabinet->add($item);
} else {
    echo "Invalid Item!";
}

echo "Adding after status (One Item) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

// Taking one item
if ($drinksCabinet->checkValidItem($item)) {
    $drinksCabinet->take($item);
} else {
    echo "Invalid Item!";
}

echo "Take after status (One Item) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

echo "<br/><br/>";

echo "Adding before status (Multiple Item / Full) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

for ($i = 0; $i <= 60; $i++) {
    if ($drinksCabinet->checkValidItem($item)) {
        $drinksCabinet->add($item);
    } else {
        echo "Invalid item!";
    }
}

echo "Adding after status (Multiple Item / Full) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

// Multiple taking
for ($i = 0; $i <= 60; $i++) {
    if ($drinksCabinet->checkValidItem($item)) {
        $drinksCabinet->take($item);
    } else {
        echo "Invalid item!";
    }
}


echo "Take after status (Multiple Item / Full) : " . $drinksCabinet->getFriendlyStatus() . "<br/>";

echo "<br/><br/>";

// Define item
$item = new Item(2, "Cola 33cl");

echo "Check Valid Item Before " . $drinksCabinet->getFriendlyStatus() . "<br/>";

// Adding one item
if ($drinksCabinet->checkValidItem($item)) {
    $drinksCabinet->add($item);
} else {
    echo "Invalid Item!";
}

echo "<br/> Check Valid Item After " . $drinksCabinet->getFriendlyStatus() . "<br/>";