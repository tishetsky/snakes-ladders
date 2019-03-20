<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 20.03.2019
 * Time: 16:49
 */

namespace App;


class Dice
{
    protected $lastValue = 0;

    /**
     * @var int maximum number that can be rolled
     *
     * In case we use dice with more than 6 sides
     */
    protected $maxValue = 6;

    public function __construct(int $maxValue)
    {
        if ($maxValue > 0) {
            $this->maxValue = $maxValue;
        }
    }

    /**
     * @return int
     */
    public function roll(): int
    {
        $this->lastValue = rand(1, $this->maxValue);
        return $this->getLastValue();
    }

    /**
     * @return int
     */
    public function getLastValue(): int
    {
        return $this->lastValue;
    }
}