<?php

namespace Sample;

/**
 *
 * @author Everton
 */
class RoutineOneRot extends \PTK\Console\Flow\Routine\RoutineAbstract {
    
    protected string $label = 'Rotina 1';
    
    public function __construct(\PTK\Console\Flow\Program\ProgramInterface $program) {
        parent::__construct($program);
    }
}
