<?php

// Include classes
require_once "Cabinet.php";
require_once "Shelf.php";

class DrinksCabinet extends Cabinet
{
    /**
     * Constants
     */
    const VALID_ITEM_ID = 1;

    /**
     * @var array|Shelf[]
     */
    public $shelves = [];


    /**
     * DrinkCabinet constructor.
     * @param int $numberOfShelves
     * @param int $capacityOfShelf
     */
    public function __construct($numberOfShelves = 3, $capacityOfShelf = 20)
    {
        // Add shelves
        $this->addShelf($numberOfShelves, $capacityOfShelf);
    }

    /**
     * @param $numberOfShelves
     * @param $capacityOfShelf
     * @return void
     */
    public function addShelf($numberOfShelves, $capacityOfShelf)
    {
        if ($numberOfShelves > 0 && $capacityOfShelf > 0) {
            for ($i = 1; $i <= $numberOfShelves; $i++) {
                $this->shelves[] = new Shelf($capacityOfShelf);
            }
        }
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function add(Item $item): bool
    {
        // Update Status
        $this->updateStatus();

        // Check valid item
        if ($this->checkValidItem($item)) {

            for ($i = 0; $i <= $this->getNumberOfShelves() - 1; $i++) {

                // Open the door
                $this->openDoor();

                if ($this->getStatus() != self::STATUS_FULL && $this->shelves[$i]->putItem($item)) {

                    // Update Status
                    $this->updateStatus();
                    // Close the door
                    $this->closeDoor();

                    return true;

                }

            }

            // Close the door
            $this->closeDoor();
        }


        return false;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function take(Item $item): bool
    {
        // Update Status
        $this->updateStatus();

        // Check valid item
        if ($this->checkValidItem($item)) {
            for ($i = 0; $i <= $this->getNumberOfShelves() - 1; $i++) {

                // Open the door
                $this->openDoor();

                if ($this->shelves[$i]->takeItem($item)) {

                    $this->updateStatus();

                    // Close the door
                    $this->closeDoor();

                    return true;
                }
            }
            // Close the door
            $this->closeDoor();
        }


        return false;
    }

    /**
     * @return int
     */
    public function getNumberOfShelves(): int
    {
        return count($this->shelves);
    }


    /**
     * @param Item $item
     * @return bool
     */
    public function checkValidItem(Item $item): bool
    {
        if ($item->getId() == self::VALID_ITEM_ID) {
            return true;
        }

        return false;
    }


    /**
     * @return array
     */
    public function getShelfStatuses(): array
    {
        return array_column($this->shelves, 'status');
    }

    /**
     * @return void
     */
    public function updateStatus()
    {
        // Get each status of shelf
        $shelfStatuses = $this->getShelfStatuses();

        if (count(array_unique($shelfStatuses)) === 1 && end($shelfStatuses) === self::STATUS_FULL) {
            $this->setStatus(self::STATUS_FULL);
        } elseif (count(array_unique($shelfStatuses)) === 1 && end($shelfStatuses) === self::STATUS_EMPTY) {
            $this->setStatus(self::STATUS_EMPTY);
        } else {
            $this->setStatus(self::STATUS_PARTIALLY_FULL);
        }
    }
}
