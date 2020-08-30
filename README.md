# Dice Roller
*Command-line polyhedral dice roller*
![CLI Dice Roller Output](https://github.com/amacrobert/dice-roller/raw/master/doc/img/dice-roller-screenshot.jpg)

## Usage
Roll once:
```
$ roll 3d6+2
```
Or roll interactively:
```
$ roll
roll> 3d6+5
roll> d20
roll> quit
```

## Installation
1. Install globally via [Composer](https://getcomposer.org/download/):
```
$ composer global require amacrobert/dice-roller
```
2. If you don't already have your global composer bin directory as part of your PATH, add it in your shell profile:
```
export PATH=$PATH:$HOME/.composer/vendor/bin/
```

