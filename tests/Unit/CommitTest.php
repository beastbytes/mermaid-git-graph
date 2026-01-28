<?php

use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;

defined('COMMENT') or define('COMMENT', 'comment');

test('Commit test', function () {
    expect((new Commit())->render(''))
        ->toBe('commit')
        ->and((new Commit('commitTag'))->render(''))
        ->toBe('commit id:"commitTag"')
        ->and((new Commit(type: CommitType::highlight))->render(''))
        ->toBe('commit type:HIGHLIGHT')
        ->and((new Commit(type: CommitType::reverse))->render(''))
        ->toBe('commit type:REVERSE')
        ->and((new Commit(tag: 'beta_0.0.2'))->render(''))
        ->toBe('commit tag:"beta_0.0.2"')
        ->and((new Commit('commitTag', 'beta_0.0.2', CommitType::highlight))->render(''))
        ->toBe('commit id:"commitTag" type:HIGHLIGHT tag:"beta_0.0.2"')
        ->and((new Commit())->withComment(COMMENT)->render(''))
        ->toBe('%% ' . COMMENT . "\ncommit")
    ;
});