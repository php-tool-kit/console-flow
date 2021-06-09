<?php

require 'vendor/autoload.php';

$env = new Sample\SampleEnvironment();

$program = new \Sample\SampleProgram($env);

$rot0 = new \Sample\EntryPointRot($program);
$rot1 = new Sample\RoutineOneRot($program);
$rot1a = new \Sample\RoutineOneARot($program);
$rot1b = new \Sample\RoutineOneBRot($program);
$rot2 = new \Sample\RoutineTwoRot($program);


$rot0->registerSubRoutine($rot1)
        ->registerSubRoutine($rot2);

$rot1->registerSubRoutine($rot1a)
        ->registerSubRoutine($rot1b);

$program->entryPoint($rot0);

$program->run();