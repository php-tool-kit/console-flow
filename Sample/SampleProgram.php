<?php

namespace Sample;

/**
 * Programa de exemplo
 *
 * @author Everton
 */
class SampleProgram extends \PTK\Console\Flow\Program\ProgramAbstract {

    public function __construct(\PTK\Console\Flow\Environment\EnvironmentInterface $environment) {
        parent::__construct($environment);
    }

    public function run(): void {
        $this->executeEntryPoint();
    }

}
