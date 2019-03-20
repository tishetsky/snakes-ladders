<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 20.03.2019
 * Time: 16:56
 */

namespace App;

class Game
{
    /**
     * @var array
     */
    protected $messages = [
        'snake' => 'snake',
        'ladder' => 'ladder',
    ];

    /**
     * @var int
     */
    protected $currentPosition = 1;

    /**
     * @var int
     */
    protected $targetPosition = 100;

    /**
     * @var array values that trigger snake
     */
    protected $snakeValues = [9];

    /**
     * @var int position change in case of snake
     */
    protected $snakePositionChange = -3;

    /**
     * @var array values that trigger ladder
     */
    protected $ladderValues = [25, 55];

    /**
     * @var int
     */
    protected $ladderPositionChange = 10;

    /**
     * @var Dice
     */
    protected $dice;

    /**
     * @var string message to print in case of snake or ladder
     */
    protected $message = '';

    /**
     * @var string
     */
    protected $outputFormat = "%s-%s%s";

    public function __construct()
    {
        return $this;
    }

    public function play()
    {
        while (!$this->isFinished()) {

            $points = $this->dice->roll();

            $newPosition = $this->updatePosition($points);

            printf($this->outputFormat.PHP_EOL, $points, $this->getMessage(), $newPosition);

            usleep(300000);
        }
    }

    public function updatePosition(int $points)
    {
        $position = $this->currentPosition + $points;

        $this->message = '';

        if ($position > $this->targetPosition) {
            return $this->currentPosition;
        }

        foreach ($this->snakeValues as $value) {
            if ($position % $value === 0) {
                $this->setMessage('snake');
                $position += $this->snakePositionChange;
            }
        }

        foreach ($this->ladderValues as $value) {
            if ($position == $value) {
                $this->setMessage('ladder');
                $position += $this->ladderPositionChange;
            }
        }

        $this->currentPosition = $position;
        return $this->currentPosition;
    }

    /**
     * @param string|null $key
     */
    protected function setMessage(string $key = null)
    {
        $this->message = (!is_null($key) && isset($this->messages[$key])) ? $this->messages[$key] : '';
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param Dice $dice
     * @return Game
     */
    public function setDice(Dice $dice): Game
    {
        $this->dice = $dice;
        return $this;
    }

    /**
     * @param int $value
     * @return Game
     */
    public function setTargetPosition(int $value): Game
    {
        if ($value > 0) {
            $this->targetPosition = $value;
        }
        return $this;
    }

    public function setOutputFormat(?string $format)
    {
        if (is_string($format) && sprintf($format, 1, 1, 1)) {
            $this->outputFormat = trim($format);
        }
        return $this;
    }

    protected function isFinished(): bool
    {
        return $this->currentPosition >= $this->targetPosition;
    }
}