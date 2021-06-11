<?php

namespace PTK\Console\Flow\Routine;

/**
 * Base para routines
 *
 * @author Everton
 */
abstract class RoutineAbstract implements RoutineInterface {

    protected \PTK\Console\Flow\Program\ProgramInterface $program;
    protected array $subRoutines = [];

    public function __construct(\PTK\Console\Flow\Program\ProgramInterface $program) {
        $this->program = $program;
    }

    public function execute(): bool {
        $console = $this->program->console();
        $loop = true;
        $result = true;

        do {
            $this->initialize();
            $rot = $this->choice();
            if ($rot === null) {
                $loop = false;
            } else {
                $result = $rot->execute();
            }
            $this->finalize();
        } while ($loop === true);

        return $result;
    }

    public function registerSubRoutine(RoutineInterface $routine, string $label = ''): RoutineInterface {
        if ($label === '') {
            $label = $routine->getLabel();
        }

        $this->subRoutines[$label] = $routine;
        return $this;
    }

    public function getLabel(): string {
        return $this->label;
    }

    protected function choice(): ?RoutineInterface {
        $console = $this->program->console();
        $console->br();

        $labels = array_keys($this->subRoutines);
        $labels[99] = 'Voltar';
        $labels['x'] = 'Sair';

        $maxSizeLabel = $this->detectMaxSizeLabel($labels);

        foreach ($labels as $key => $label) {
            $keyPadded = str_pad($key, $maxSizeLabel, ' ', STR_PAD_LEFT);
            $console->out("[ $keyPadded ] $label");
        }

        $console->br();
        $input = $console->input('>>>');
        $input->accept(array_keys($labels))->strict();

        $prompt = $input->prompt();

        if ($prompt === 'x' || $prompt === 'X') {
            exit();
        }

        if ($prompt == 99) {
            return null;
        }

        return $this->subRoutines[$labels[$prompt]];
    }

    /**
     * Rotinas de inicialização para o método execute()
     * @return void
     */
    protected function initialize(): void {
        $this->program->console()->clear();
        $this->program->addBreadcrumbSegment($this->label);
        $this->program->breadcrumb();
    }

    /**
     * Rotinas de finalização para o método execute()
     * @return void
     */
    protected function finalize(): void {
        $this->program->delLastBreadcrumbSegment();
    }

    protected function detectMaxSizeLabel(array $labels): int {
        $maxSize = 0;

        foreach ($labels as $key => $label) {
            $size = strlen($key);
            if ($size > $maxSize) {
                $maxSize = $size;
            }
        }
        
//        if(($maxSize % 2) === 0) {
//            $maxSize += 2;
//        }

        return $maxSize;
    }

}
