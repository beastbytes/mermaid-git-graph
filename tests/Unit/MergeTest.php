<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Merge;

test('GitGraph test', function () {
    $branch = new Branch('hotfix');

    expect((new Merge())->render(''))
        ->toBe('merge main')
        ->and((new Merge($branch))->render(''))
        ->toBe('merge hotfix')
    ;
});
