<?php

// Include classes
require_once "Item.php";

class Shelf
{
    const STATUS_EMPTY = 0;
    const STATUS_PARTIALLY_FULL = 1;
    const STATUS_FULL = 2;

    /**
     * @var array
     */
    public $items = [];

    /**
     * @var integer
     */
    public $totalItems = 0;

    /**
     * @var integer
     */
    public $itemCapacity;

    /**
     * @var integer
     */
    public $status = self::STATUS_EMPTY;

    /**
     * Shelf constructor.
     * @param int $itemCapacity
     */
    public function __construct(int $itemCapacity)
    {
        $this->itemCapacity = $itemCapacity;
    }


    /**
     * @param Item $item
     * @return bool
     */
    public function putItem(Item $item): bool
    {
        // Update the shelf status
        $this->updateShelfStatus();

        if ($this->getStatus() != self::STATUS_FULL) {

            // Add item to collection
            $this->items[] = $item;
            // Increase one total items
            $this->totalItems++;

            // Update the shelf status
            $this->updateShelfStatus();

            return true;
        }

        return false;
    }


    /**
     * @param Item $item
     * @return bool
     */
    public function takeItem(Item $item): bool
    {
        // Update the shelf status
        $this->updateShelfStatus();

        // Check shelf empty
        if ($this->getTotalItems() != 0) {

            // pop one item
            array_pop($this->items);
            // decrease one to total items
            $this->totalItems--;

            $this->updateShelfStatus();

            return true;
        }

        return false;
    }

    /**
     * @return void
     */
    public function updateShelfStatus()
    {
        if ($this->getTotalItems() > 0 && $this->getTotalItems() < $this->itemCapacity) {
            $this->setStatus(self::STATUS_PARTIALLY_FULL);
        } elseif ($this->getTotalItems() == $this->itemCapacity) {
            $this->setStatus(self::STATUS_FULL);
        } else {
            $this->setStatus(self::STATUS_EMPTY);
        }
    }

    /**
     * @return int
     */
    public function getItemCapacity(): int
    {
        return $this->itemCapacity;
    }

    /**
     * @param int $itemCapacity
     * @return int
     */
    public function setItemCapacity(int $itemCapacity): int
    {
        $this->itemCapacity = $itemCapacity;
    }

    /**
     * @return int
     */
    public function getTotalItems() : int
    {
        return $this->totalItems;
    }

    /**
     * @return int
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}
