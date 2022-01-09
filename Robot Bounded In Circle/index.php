<?php

class Solution
{
    /**
     * Where the robot is facing, it could be: 0, 1, 2, or 3
     *      0
     *      |
     * 3 -- - -- 1
     *      |
     *      2
     * @var integer
     */
    private $face = 0;
    /**
     * X point location
     *
     * @var integer
     */
    private $x = 0;
    /**
     * Y point location
     *
     * @var integer
     */
    private $y = 0;

    public function isRobotBounded(string $instructions): bool
    {
        $instructions = str_split($instructions);
        for ($i = 0; $i < 10; $i++) {
            foreach ($instructions as $instruction) {
                $this->executeInstruction($instruction);
            }
            if ($this->x == 0 && $this->y == 0) {
                return true;
            }
        }
        return false;
    }

    private function executeInstruction(string $instruction): void
    {
        if ($instruction != 'G') {
            $this->turnRobot($instruction);
            return;
        }

        $this->moveRobot();
    }

    private function turnRobot(string $direction): void
    {
        if ($direction == 'R') {
            $this->face = ($this->face == 3) ? 0 : ++$this->face;
        } else {
            $this->face = ($this->face == 0) ? 3 : --$this->face;
        }
    }

    private function moveRobot()
    {
        switch ($this->face) {
            case 0:
                $this->y++;
                break;
            case 1:
                $this->x++;
                break;
            case 2:
                $this->y--;
                break;
            case 3:
                $this->x--;
                break;
            default:
                exit(1);
                break;
        }
    }
}

$case = "GGRRGG";
$solution = new Solution;

var_dump($solution->isRobotBounded($case));
