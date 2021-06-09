<?php

namespace Sample;

/**
 * Exemplo de environment
 *
 * @author Everton
 */
class SampleEnvironment extends \PTK\Console\Flow\Environment\EnvironmentAbstract {
    public function __construct() {
        $this->resources['config'] = [
            'app' => [
                'name' => 'Flow Sample',
                'version' => '1.0.1',
            ]
        ];
    }
}
