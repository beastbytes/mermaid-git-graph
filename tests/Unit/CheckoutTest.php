<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;

test('GitGraph test', function () {
    $branch = new Branch('hotfix');

    expect((new Checkout())->render(''))
        ->toBe('checkout main')
        ->and((new Checkout($branch))->render(''))
        ->toBe('checkout hotfix')
    ;
});
