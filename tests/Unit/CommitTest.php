<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;
use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;
use BeastBytes\Mermaid\GitGraph\GitGraph;
use BeastBytes\Mermaid\GitGraph\Merge;

test('Commit test', function () {
    expect((new Commit())->render(''))
        ->toBe('commit')
        ->and((new Commit('commitTag'))->render(''))
        ->toBe('commit id:"commitTag"')
        ->and((new Commit(type: CommitType::Highlight))->render(''))
        ->toBe('commit type:HIGHLIGHT')
        ->and((new Commit(type: CommitType::Reverse))->render(''))
        ->toBe('commit type:REVERSE')
        ->and((new Commit(tag: 'beta_0.0.2'))->render(''))
        ->toBe('commit tag:"beta_0.0.2"')
        ->and((new Commit('commitTag', 'beta_0.0.2', CommitType::Highlight))->render(''))
        ->toBe('commit id:"commitTag" type:HIGHLIGHT tag:"beta_0.0.2"')
    ;
});
