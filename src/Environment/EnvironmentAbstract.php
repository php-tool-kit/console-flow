<?php

namespace PTK\Console\Flow\Environment;

/**
 * Environment base.
 *
 * @author Everton
 */
abstract class EnvironmentAbstract implements EnvironmentInterface {
    
    protected array $resources = [];
    
    public function __get(string $member): mixed {
        if(key_exists($member, $this->resources)) {
            return $this->resources[$member];
        }
        
        throw new ResourceNotFoundException($member);
    }

}
