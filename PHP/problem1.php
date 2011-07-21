<?php
/*
 * Project Euler problem 1:
 *
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
 * The sum of these multiples is 23.
 * Find the sum of all the multiples of 3 or 5 below 1000.
 *
 * From http://projecteuler.net/index.php?section=problems&id=1
 *
 * Implementation by Daniel Norris <shastao@gmail.com>
 *
 */


/**
 * Sums all integers below a given limit integer that are multiples of a set of other integers.
 * @param array $query array of integers
 * @param $limit integer one beyond what you wish to evaluate
 * @return int|bool sum of all the multiples below limit, or false if parameters are invalid
 */
function sumMultiplesBelow(array $query, $limit)
{
    // check to make sure the array contains something
    if (sizeof($query) < 1)
    {
        echo "ERROR query array expected number of elements > 0";
        return false;
    }

    // check to make sure all multiples are positive integers
    foreach($query as $number)
    {
        if (!is_int($number) ||
            $number < 1)
        {
            echo "ERROR query expected positive integer, given {$number}";
            return false;
        }
    }

    // check to make sure limit is a positive integer
    if (!is_int($limit) ||
        $limit < 1)
    {
        echo "ERROR limit expected positive integer, given {$limit}";
        return false;
    }
    
    $numbers = array(); // container for matched integers

    for ($i = 1; $i < $limit; $i++)
    {
        foreach ($query as $target)
        {
            if ($i % $target === 0)
            {
                array_push($numbers, $i);
                break;
            }
        }
    }
    
    return array_sum($numbers);
}

// main

$multiples = array(3, 5);
echo sumMultiplesBelow($multiples, 1000);


