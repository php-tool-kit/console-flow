<?php

namespace PTK\Console\Flow\Program;

/**
 * Classe abstrata base para programas
 *
 * @author Everton
 */
abstract class ProgramAbstract implements ProgramInterface {
    
    protected \PTK\Console\Flow\Environment\EnvironmentInterface $environment;
    protected \PTK\Console\Flow\Routine\RoutineInterface $entryPoint;
    protected \League\CLImate\CLImate $console;
    protected array $breadcrumb = [];


    public function __construct(\PTK\Console\Flow\Environment\EnvironmentInterface $environment) {
        $this->environment = $environment;
        $this->console = new \League\CLImate\CLImate();
    }

    public function console(): \League\CLImate\CLImate {
        return $this->console;
    }
    
    public function entryPoint(\PTK\Console\Flow\Routine\RoutineInterface $routine): ProgramInterface {
        $this->entryPoint = $routine;
        return $this;
    }
    
    public function addBreadcrumbSegment(string $segment): void {
        $this->breadcrumb[] = $segment;
    }
    
    public function delLastBreadcrumbSegment(): void {
        array_pop($this->breadcrumb);
    }

    public function breadcrumb(): void {
        $console = $this->console();
        $lastKeySegment = array_key_last($this->breadcrumb);
        foreach ($this->breadcrumb as $key => $segment){
            if($key === $lastKeySegment){
                $console->green()->out("/$segment");
            }else{
                $console->inline("/$segment");
            }
        }
    }
    
    public function getEnvironment(): \PTK\Console\Flow\Environment\EnvironmentInterface {
        return $this->environment;
    }
    
    protected function executeEntryPoint(): void {
        $this->entryPoint->execute();
    }

    abstract public function run(): void;

}
