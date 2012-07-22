<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sensio\Bundle\DistributionBundle\Diff;

/**
 * Computes a Diff between files (line by line).
 *
 * Implements the Longest common subsequence problem algorithm.
 *
 * @see http://en.wikipedia.org/wiki/Longest_common_subsequence_problem
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Diff
{
    private $diff;

    public function __construct($str1, $str2)
    {
        $lines1 = explode("\n", $str1);
        $lines2 = explode("\n", $str2);

        $this->diff = $this->computeDiff($this->computeLcs($lines1, $lines2), $lines1, $lines2, count($lines1) - 1, count($lines2) - 1);
    }

    public function getDiff()
    {
        $diff = array();
        for ($i = 0, $max = count($this->diff); $i < $max; $i++) {
            if ('' != $this->diff[$i][0]) {
                $diff[] = array('@', sprintf(' Line %s', $this->diff[$i][2]));

                do {
                    $diff[] = $this->diff[$i++];
                } while ('' != $this->diff[$i][0]);
            }
        }

        return $diff;
    }

    public function computeDiff(array $c, array $lines1, array $lines2, $i, $j)
    {
        $diff = array();

        if ($i > -1 && $j > -1 && $lines1[$i] == $lines2[$j]) {
            $diff = array_merge($diff, $this->computeDiff($c, $lines1, $lines2, $i - 1, $j - 1));
            $diff[] = array('', $lines1[$i], $i, $j);
        } else {
            if ($j > -1 && ($i == -1 || $c[$i][$j - 1] >= $c[$i - 1][$j])) {
                $diff = array_merge($diff, $this->computeDiff($c, $lines1, $lines2, $i, $j - 1));
                $diff[] = array('+', $lines2[$j], $i, $j);
            } elseif ($i > -1 && ($j == -1 || $c[$i][$j - 1] < $c[$i - 1][$j])) {
                $diff = array_merge($diff, $this->computeDiff($c, $lines1, $lines2, $i - 1, $j));
                $diff[] = array('-', $lines1[$i], $i, $j);
            }
        }
 
        return $diff;
    }

    private function computeLcs(array $lines1, array $lines2)
    {
        for ($i = -1, $len1 = count($lines1); $i < $len1; $i++) {
            for ($j = -1, $len2 = count($lines2); $j < $len2; $j++) {
                $c[$i][$j] = 0;
            }
        }

        for ($i = 0; $i < $len1; $i++) {
            for ($j = 0; $j < $len2; $j++) {
                if ($lines1[$i] == $lines2[$j]) {
                    $c[$i][$j] = $c[$i - 1][$j - 1] + 1;
                } else {
                    $c[$i][$j] = max($c[$i][$j - 1], $c[$i - 1][$j]);
                }
            }
        }

        return $c;
    }
}
