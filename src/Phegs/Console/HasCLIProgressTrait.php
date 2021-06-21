<?php

namespace Simtabi\Pheg\Phegs\Console;

use Simtabi\Pheg\Phegs\Console\Painter\ConsolePainter;
use Pheg;

trait HasCLIProgressTrait
{

    protected CLIProgressBar $progressbar;
    protected ConsolePainter $painter;

    public function __construct(){
        $this->painter = new ConsolePainter();
    }

    public function startProgressbar(array | object | int $data, ?string $message = 'Starting task...', bool $newline = true): static
    {

        echo $this->painter->yellow($message);

        $count             = is_array($data) | is_object($data) ? Pheg::count($data) : $data;
        $this->progressbar = new CLIProgressBar(0, $count);

        $this->progressbar->setFormat('Progress : %current%/%max% [%bar%] %percent%% %eta% %foo%');
        $this->progressbar->addReplacementRule('%foo%', 70, function ($buffer, $registry) {
            return $this->painter->green('OK!');
        });
        return $this;
    }

    public function registerProgress(int $step = 1, int $sleep = 1500): static
    {
        $this->progressbar->update($step);
        usleep($sleep);
        return $this;
    }

    public function registerProgressInsideLoop(int $sleep = 1500): static
    {
        usleep($sleep);
        $this->progressbar->advance();
        return $this;
    }

    public function finishProgress(string $message = 'Task completed successfully', bool $newline = true)
    {
        return $this->progressbar->finished();
    }

}
