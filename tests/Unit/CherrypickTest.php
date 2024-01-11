<?php

use BeastBytes\Mermaid\GitGraph\Cherrypick;
use BeastBytes\Mermaid\GitGraph\Commit;

test('Cherrypick test', function () {
    expect((new Cherrypick(new Commit('commitId')))->render(''))
        ->toBe('cherrypick id:"commitId"');
});

it('throws exception', function () {
    (new Cherrypick(new Commit()))->render('');
})->throws(RuntimeException::class, 'Commit id not set');

