# Snakes and Ladders

Test assignment for Compensair company.

To get this working run:
- git clone https://github.com/tishetsky/snakes-ladders
- composer dumpautoload
- php thegame.php

## Snakes and Ladders technical challenge

The challenge is to create an OOP version of CLI tool that plays a multiplayer game of snakes and ladders on it’s own, use PHP 7+. Using modern technics & tools of code organisation, correctness check, and delivery would be appreciated.

Put the result on GitHub and the link back.

## Rules

You must continue to roll the dice every second till you reach position 100 exactly, you start at position 1

If your new position after the roll divides by 9 (9, 18, 27, 36…) you landed on a snake and must move back 3 places

If your new position after the roll is 25 or 55 you must move forward 10 places

If your roll is near the end of the game and you do not roll enough to move exactly to 100, you do not move forward

You must output on a new line each turns dice roll, if they landed on a snake or ladder and where their final position was

There must be a hyphen to separate the dice roll from the position and snake/ladder verdict

### Sample output:
```
5-6
1-7
5-12
3-15
6-21
4-ladder35
3-38
5-43
1-44
5-49
2-51
1-52
5-57
6-snake60
5-65
4-69
2-71
2-73
4-77
3-80
3-83
3-86
1-87
1-88
3-91
3-94
5-snake96
5-96
1-97
5-97
5-97
3-100
```
