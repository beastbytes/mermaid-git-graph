<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;
use BeastBytes\Mermaid\GitGraph\CherryPick;
use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;
use BeastBytes\Mermaid\GitGraph\GitGraph;
use BeastBytes\Mermaid\GitGraph\Merge;
use BeastBytes\Mermaid\Mermaid;

defined('COMMENT') or define('COMMENT', 'comment');
defined('TITLE') or define('TITLE', 'title');

test('GitGraph test', function () {
    $main = new Branch('main');

    expect(Mermaid::create(GitGraph::class, ['title' => TITLE])
        ->withComment(COMMENT)
        ->withItem(
            new Commit(),
            $hotfix = new Branch('hotfix'),
            $checkoutHotfix = new Checkout($hotfix),
            new Commit(),
            $develop = new Branch('develop'),
            $checkoutDevelop = new Checkout($develop),
            $ash = new Commit('ash', 'abc'),
            $featureB = new Branch('featureB'),
            $checkoutFeatureB = new Checkout($featureB),
            new Commit(type: CommitType::highlight),
            $checkoutHotfix,
            new Commit(),
            new Checkout($develop),
            new Commit(type: CommitType::reverse),
            $checkoutFeatureB,
            new Commit(),
            $checkoutMain = new Checkout($main),
            new Merge($hotfix),
            $checkoutFeatureB,
            new Commit(),
            $checkoutDevelop,
            $featureA = new Branch('featureA'),
            new Commit(),
            $checkoutDevelop,
            new CherryPick($ash),
            new Merge($hotfix),
            new Checkout($featureA),
            new Commit(),
            $checkoutFeatureB,
            new Commit(),
            $checkoutDevelop,
            new Merge($featureA),
            $release = new Branch('release'),
            $checkoutRelease = new Checkout($release),
            new Commit(),
            $checkoutMain,
            new Commit(),
            $checkoutRelease,
            new Merge($main),
            new Merge($develop)
        )
        ->render()
    )
        ->toBe(<<<EXPECTED
<pre class="mermaid">
---
title: title
---
%% comment
gitGraph LR:
  commit
  branch "hotfix"
  checkout "hotfix"
  commit
  branch "develop"
  checkout "develop"
  commit id:"ash" tag:"abc"
  branch "featureB"
  checkout "featureB"
  commit type:HIGHLIGHT
  checkout "hotfix"
  commit
  checkout "develop"
  commit type:REVERSE
  checkout "featureB"
  commit
  checkout "main"
  merge "hotfix"
  checkout "featureB"
  commit
  checkout "develop"
  branch "featureA"
  commit
  checkout "develop"
  cherry-pick id:"ash"
  merge "hotfix"
  checkout "featureA"
  commit
  checkout "featureB"
  commit
  checkout "develop"
  merge "featureA"
  branch "release"
  checkout "release"
  commit
  checkout "main"
  commit
  checkout "release"
  merge "main"
  merge "develop"
</pre>
EXPECTED
    );
});
