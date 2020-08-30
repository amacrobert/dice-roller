<?php

namespace AMacRobert\DiceRoller;

class DiceRoller
{
    public static function roll(string $string, array &$rolls = [])
    {
        if (!preg_match('/^([0-9]*)d([0-9]+)([+-])?([0-9]*)$/i', $string, $matches)) {
            print 'Unrecognized input.' . PHP_EOL;
            return;
        }

        list(, $total_dice, $die_sides, $modifier_type, $modifier) = $matches;

        // Treat "d20" as "1d20"
        if (!$total_dice) {
            $total_dice = 1;
        }

        for ($i = 0; $i < $total_dice; $i++) {
            $rolls[] = rand(1, $die_sides);
        }

        $total_roll = array_sum($rolls) + ($modifier_type == '-' ? -$modifier : ($modifier ?: 0));

        print '(' . implode(') + (', $rolls) . ')' . ($modifier_type ? ' ' . $modifier_type . ' ' . $modifier : '') . PHP_EOL;
        self::print_fancy_number($total_roll);
        print PHP_EOL;
    }

    private function print_fancy_number(int $n)
    {
        $digits = str_split($n);

        for ($row = 0; $row < 6; $row++) {
            foreach ($digits as $digit) {
                print self::NUMBER_ART[$digit][$row];
            }
            print PHP_EOL;
        }
    }

    private const NUMBER_ART = [
        ['  ___  ', ' / _ \ ', '| | | |', '| | | |', '| | | |', ' \___/ '],
        [' __ ', '/_ |', ' | |', ' | |', ' | |', ' |_|'],
        [' ___  ', '|__ \ ', '   ) |', '  / / ', ' / /_ ', '|____|'],
        [' ____  ', '|___ \ ', '  __) |', ' |__ < ', ' ___) |', '|____/ '],
        [' _  _   ', '| || |  ', '| || |_ ', '|__   _|', '   | |  ', '   |_|  '],
        [' _____ ', '| ____|', '| |__  ', '|___ \ ', ' ___) |', '|____/ '],
        ['   __  ', '  / /  ', ' / /_  ', '| \'_ \ ', '| (_) |', ' \___/ '],
        [' ______ ', '|____  |', '    / / ', '   / /  ', '  / /   ', ' /_/    '],
        ['  ___  ', ' / _ \ ', '| (_) |', ' > _ < ', '| (_) |', ' \___/ '],
        ['  ___  ', ' / _ \ ', '| (_) |', ' \__, |', '   / / ', '  /_/  '],
    ];
}






