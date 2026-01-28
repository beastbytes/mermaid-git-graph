<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;
use BeastBytes\Mermaid\GitGraph\Cherrypick;
use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;
use BeastBytes\Mermaid\GitGraph\GitGraph;
use BeastBytes\Mermaid\GitGraph\Merge;
use BeastBytes\Mermaid\Mermaid;

defined('COMMENT') or define('COMMENT', 'comment');
defined('TITLE') or define('TITLE', 'title');

test('GitGraph test', function () {
    expect(Mermaid::create(GitGraph::class, ['title' => TITLE])
            ->withComment(COMMENT)
            ->withItem(
                $commit = new Commit(),
                $branchHotfix = new Branch('hotfix'),
                $checkoutHotfix = new Checkout($branchHotfix),
                $commit,
                $develop = new Branch('develop'),
                $checkoutDevelop = new Checkout($develop),
                $ash = new Commit('ash', 'abc'),
                $featureB = new Branch('featureB'),
                $checkoutFeatureB = new Checkout($featureB),
                new Commit(type: CommitType::highlight),
                $checkoutMain = new Checkout(),
                $checkoutHotfix,
                $commit,
                new Checkout($develop),
                new Commit(type: CommitType::reverse),
                $checkoutFeatureB,
                $commit,
                $checkoutMain,
                new Merge($branchHotfix),
                $checkoutFeatureB,
                $commit,
                $checkoutDevelop,
                $featureA = new Branch('featureA'),
                $commit,
                $checkoutDevelop,
                new Cherrypick($ash),
                new Merge($branchHotfix),
                new Checkout($featureA),
                $commit,
                $checkoutFeatureB,
                $commit,
                $checkoutDevelop,
                new Merge($featureA),
                $release = new Branch('release'),
                $checkoutRelease = new Checkout($release),
                $commit,
                $checkoutMain,
                $commit,
                $checkoutRelease,
                new Merge(),
                $checkoutDevelop,
                new Merge($release)
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
  branch hotfix
  checkout hotfix
  commit
  branch develop
  checkout develop
  commit id:&quot;ash&quot; tag:&quot;abc&quot;
  branch featureB
  checkout featureB
  commit type:HIGHLIGHT
  checkout main
  checkout hotfix
  commit
  checkout develop
  commit type:REVERSE
  checkout featureB
  commit
  checkout main
  merge hotfix
  checkout featureB
  commit
  checkout develop
  branch featureA
  commit
  checkout develop
  cherrypick id:&quot;ash&quot;
  merge hotfix
  checkout featureA
  commit
  checkout featureB
  commit
  checkout develop
  merge featureA
  branch release
  checkout release
  commit
  checkout main
  commit
  checkout release
  merge main
  checkout develop
  merge release
</pre>
EXPECTED
    );
});
