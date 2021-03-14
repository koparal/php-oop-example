<?php

abstract class Cabinet
{
    /**
     * Door Status Constants
     */
    const DOOR_OPEN = 1;
    const DOOR_CLOSED = 0;

    /**
     * Status Constants
     */
    const STATUS_EMPTY = 0;
    const STATUS_PARTIALLY_FULL = 1;
    const STATUS_FULL = 2;

    /**
     * @var int
     */
    public $doorStatus = self::DOOR_CLOSED;

    /**
     * @var int
     */
    public $status = self::STATUS_EMPTY;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getDoorStatus(): int
    {
        return $this->doorStatus;
    }

    /**
     * @param int $doorStatus
     * @return void
     */
    public function setDoorStatus(int $doorStatus)
    {
        $this->doorStatus = $doorStatus;
    }

    /**
     * Open the door
     * @return void
     */
    public function openDoor()
    {
        $this->setDoorStatus(self::DOOR_OPEN);
    }

    /**
     * Close the door
     * @return void
     */
    public function closeDoor()
    {
        $this->setDoorStatus(self::DOOR_CLOSED);
    }

    /**
     * @return string
     */
    public function getFriendlyStatus(): string
    {
        switch ($this->getStatus()) {
            case self::STATUS_FULL:
                return "FULL";
                break;
            case self::STATUS_PARTIALLY_FULL:
                return "PARTIALLY FULL";
                break;
            default:
                return "EMPTY";
                break;
        }
    }

    /**
     * @return string
     */
    public function getFriendlyDoorStatus()
    {
        switch ($this->getDoorStatus()) {
            case self::DOOR_OPEN:
                return "OPEN";
                break;
            default:
                return "CLOSED";
                break;
        }
    }
}
