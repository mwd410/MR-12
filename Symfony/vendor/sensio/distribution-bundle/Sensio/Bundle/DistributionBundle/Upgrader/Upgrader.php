<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sensio\Bundle\DistributionBundle\Upgrade;

use Sensio\Bundle\DistributionBundle\Diff\Diff;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Upgrade class.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Upgrade
{
    public function outputConsoleDiff(OutputInterface $output, $file1, $file2)
    {
        if (is_file($file1)) {
            $file1 = realpath($file1);
            $str1 = file_get_contents($file1);
        } else {
            $str1 = '';
        }

        if (!is_file($file2)) {
            throw new \RuntimeException(sprintf('The skeleton file "%s" does not exist.', $file2));
        }
        $file2 = realpath($file2);
        $str2 = file_get_contents($file2);

        $diff = new Diff($str1, $str2);

        $output->writeln(sprintf('--- %s', $file1));
        $output->writeln(sprintf('+++ %s', $file2));
        foreach ($diff->getDiff() as $line) {
            if ('+' == $line[0]) {
                $format = '<fg=green>+%s</>';
            } elseif ('-' == $line[0]) {
                $format = '<fg=red>-%s</>';
            } elseif ('@' == $line[0]) {
                $format = '<fg=cyan>@%s</>';
            } else {
                $format = ' %s';
            }

            $output->writeln(sprintf($format, $line[1]));
        }

        $output->writeln('');
    }
}
