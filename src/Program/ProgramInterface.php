<?php
namespace PTK\Console\Flow\Program;

/**
 * Programa é o "maestro" do fluxo. É ele que inicia o primeiro fluxo e coordena
 *  a chamada dos demais.
 * 
 * @author Everton
 */
interface ProgramInterface {
    
    public function __construct(\PTK\Console\Flow\Environment\EnvironmentInterface $environment);
    
    public function getEnvironment(): \PTK\Console\Flow\Environment\EnvironmentInterface;
    
    /**
     * Executa o fluxo inicial.
     * 
     * @return void
     */
    public function run(): void;
    
    /**
     * Registra o "ponto de entrada" do programa: a primeira rotina a ser executada.
     * 
     * @param \PTK\Console\Flow\Routine\RoutineInterface $routine
     * @return ProgramInterface
     */
    public function entryPoint(\PTK\Console\Flow\Routine\RoutineInterface $routine): ProgramInterface;
    
    /**
     * Uma instância de \League\CLImate\CLImate
     * 
     * @return \League\CLImate\CLImate
     */
    public function console(): \League\CLImate\CLImate;
}
