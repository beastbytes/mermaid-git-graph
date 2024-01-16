<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;

defined('COMMENT') or define('COMMENT', 'comment');

test('Checkout test', function () {
    $branch = new Branch('hotfix');

    expect((new Checkout())->render(''))
        ->toBe('checkout main')
        ->and((new Checkout($branch))->render(''))
        ->toBe('checkout hotfix')
        ->and((new Checkout())->withComment(COMMENT)->render(''))
        ->toBe('%% ' . COMMENT . "\ncheckout main")
    ;
});
