<?php

use BeastBytes\Mermaid\GitGraph\CherryPick;
use BeastBytes\Mermaid\GitGraph\Commit;

defined('COMMENT') or define('COMMENT', 'comment');

test('Cherrypick test', function () {
    expect((new CherryPick(new Commit('commitId')))->render(''))
        ->toBe('cherry-pick id:"commitId"')
        ->and((new CherryPick(new Commit('commitId')))->withComment(COMMENT)->render(''))
        ->toBe(<<<EXPECTED
%% comment
cherry-pick id:"commitId"
EXPECTED)
    ;
});

it('throws exception', function () {
    (new CherryPick(new Commit()))->render('');
})->throws(InvalidArgumentException::class, 'commit must have an id');