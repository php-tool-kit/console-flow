<?php

namespace PTK\Console\Flow\Environment;

/**
 * Environment armazena os objetos usados em todo o programa, tais como conexões
 *  ao banco de dados, recursos, configurações, etc.
 * 
 * Cada recurso é armazenado numa propriedade somente leitura e são
 *  inicializados no construtor do environment.
 * 
 * @author Everton
 */
interface EnvironmentInterface {
    
    /**
     * Implementa o retorno dos recursos do environment.
     * 
     * @param string $member
     * @return mixed
     */
    public function __get(string $member): mixed;
}
