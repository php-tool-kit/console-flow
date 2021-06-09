<?php

namespace PTK\Console\Flow\Exception;

/**
 * Quando um recurso não está disponível no environment.
 *
 * @author Everton
 */
class ResourceNotFoundException extends \Exception {
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
