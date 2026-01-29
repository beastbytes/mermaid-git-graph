<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Merge;

defined('COMMENT') or define('COMMENT', 'comment');

test('GitGraph test', function () {
    expect((new Merge(new Branch('main')))->render(''))
        ->toBe('merge "main"')
        ->and((new Merge(new Branch('hotfix')))->render(''))
        ->toBe('merge "hotfix"')
        ->and((new Merge(new Branch('main')))->withComment(COMMENT)->render(''))
        ->toBe(<<<EXPECTED
%% comment
merge "main"
EXPECTED
        )
    ;
});