<?php

use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;

defined('COMMENT') or define('COMMENT', 'comment');

test('Commit test', function () {
    expect((new Commit())->render(''))
        ->toBe('commit')
        ->and((new Commit('commitId'))->render(''))
        ->toBe('commit id:"commitId"')
        ->and((new Commit(type: CommitType::highlight))->render(''))
        ->toBe('commit type:HIGHLIGHT')
        ->and((new Commit(tag: 'beta_0.0.2'))->render(''))
        ->toBe('commit tag:"beta_0.0.2"')
        ->and((new Commit('commitId', 'beta_0.0.2', CommitType::highlight))->render(''))
        ->toBe('commit id:"commitId" type:HIGHLIGHT tag:"beta_0.0.2"')
        ->and((new Commit('commitId'))->withComment(COMMENT)->render(''))
        ->toBe(<<<EXPECTED
%% comment
commit id:"commitId"
EXPECTED
        )
    ;
});