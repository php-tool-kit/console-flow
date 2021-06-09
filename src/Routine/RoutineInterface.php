<?php

namespace PTK\Console\Flow\Routine;

/**
 * Routine é cada segmento do programa, responsável por uma etapa do fluxo.
 * 
 * @author Everton
 */
interface RoutineInterface {
    
    public function __construct(\PTK\Console\Flow\Program\ProgramInterface $program);
    
    /**
     * Registra uma sub-rotina.
     * 
     * @param RoutineInterface $routine
     * @param string $label
     * @return RoutineInterface
     */
    public function registerSubRoutine(RoutineInterface $routine, string $label = ''): RoutineInterface;
    
    /**
     * Executa a rotina.
     * 
     * @return bool
     */
    public function execute(): bool;
    
    /**
     * Retorna o rpotulo da rotina.
     * 
     * Toda rotina deve ter um rótulo para exibir nos menus.
     * 
     * @return string
     */
    public function getLabel(): string;
}
