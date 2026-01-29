<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;

defined('COMMENT') or define('COMMENT', 'comment');

test('Checkout test', function () {
    $main = new Branch('main');
    $hotfix = new Branch('hotfix');

    expect((new Checkout($main))->render(''))
        ->toBe('checkout "main"')
        ->and((new Checkout($hotfix))->render(''))
        ->toBe('checkout "hotfix"')
        ->and((new Checkout($main))->withComment(COMMENT)->render(''))
        ->toBe(<<<EXPECTED
%% comment
checkout "main"
EXPECTED
        )
    ;
});