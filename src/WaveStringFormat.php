<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class WaveStringFormat extends Command
{
    protected function configure()
    {
        $this
            ->setName('string_to_wave')
            ->setDescription('show format string to upper_lower string')
            ->addArgument('string', InputArgument::REQUIRED, 'string to format')
            ->addOption('key', 'k', InputOption::VALUE_NONE, 'key odd')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $keyOdd = $input->getOption('key');
        $string = $input->getArgument('string');
        $string = mb_strtolower($string);
        $output->writeln($this->stringFormat($string, $keyOdd));
        return Command::SUCCESS;
    }

    protected function charFormat($char, $orderKeyFormat)
    {
        if ($orderKeyFormat) {
            return mb_strtoupper($char);
        }
        return $char;
    }

    protected function stringFormat($string, $oddUpper)
    {
        $formatString = '';
        for ($i=0; $i < strlen($string); $i++) {
            if ($i % 2 == 0) {
                $formatString .= $this->charFormat($string[$i], !$oddUpper);
            } else {
                $formatString .= $this->charFormat($string[$i], $oddUpper);
            }
        }
        return $formatString;
    }

}
