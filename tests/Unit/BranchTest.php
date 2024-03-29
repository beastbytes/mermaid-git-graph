<?php

use BeastBytes\Mermaid\GitGraph\Branch;

defined('COMMENT') or define('COMMENT', 'comment');

test('Branch test', function () {
    $branch = new Branch('hotfix');

    expect($branch->getName())
        ->toBe('hotfix')
        ->and($branch->render(''))
        ->toBe('branch hotfix')
        ->and($branch->withComment(COMMENT)->render(''))
        ->toBe('%% ' . COMMENT . "\nbranch hotfix")
    ;
});

test('Branch with order test', function () {
    $branch = new Branch('hotfix', 4);

    expect($branch->getName())
        ->toBe('hotfix')
        ->and($branch->render(''))
        ->toBe('branch hotfix order: 4');
});

it('throws exception', function () {
    new Branch('hotfix', 0);
})->throws(InvalidArgumentException::class, '`order` must be greater than 0');
