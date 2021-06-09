<?php

namespace Sample;

/**
 * Ponto de entrada/rotina inicial/principal
 *
 * @author Everton
 */
class EntryPointRot extends \PTK\Console\Flow\Routine\RoutineAbstract {
    
    protected string $label = 'Main menu';
    
    public function __construct(\PTK\Console\Flow\Program\ProgramInterface $program) {
        parent::__construct($program);
    }
}
