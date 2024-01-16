<?php

use BeastBytes\Mermaid\GitGraph\Cherrypick;
use BeastBytes\Mermaid\GitGraph\Commit;

defined('COMMENT') or define('COMMENT', 'comment');

test('Cherrypick test', function () {
    expect((new Cherrypick(new Commit('commitId')))->render(''))
        ->toBe('cherrypick id:"commitId"')
        ->and((new Cherrypick(new Commit('commitId')))->withComment(COMMENT)->render(''))
        ->toBe('%% ' . COMMENT . "\ncherrypick id:\"commitId\"")
    ;
});

it('throws exception', function () {
    (new Cherrypick(new Commit()))->render('');
})->throws(RuntimeException::class, 'Commit id not set');

