<?php

namespace Sample;

/**
 *
 * @author Everton
 */
class RoutineOneBRot extends \PTK\Console\Flow\Routine\RoutineAbstract {
    
    protected string $label = 'Rotina 1.B';
    
    public function __construct(\PTK\Console\Flow\Program\ProgramInterface $program) {
        parent::__construct($program);
    }
    
    /**
     * Sobreescreve o método de \PTK\Console\Flow\Routine\RoutineAbstract porque 
     * esta rotina não é de menu, mas sim de ação, ou seja, ela não é pra escolher 
     * outras etapas do cominho, mas para fazer alguma coisa ao final do fluxo.
     * 
     * @return bool
     */
    public function execute(): bool {
        $this->initialize();
        echo "Faz alguma coisa... ".__CLASS__, PHP_EOL;
        $input = $this->program->console()->input('Tecle enter para terminar...');
        $input->prompt();
        $this->finalize();
        return true;
    }
}
