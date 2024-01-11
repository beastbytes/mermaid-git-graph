<?php

use BeastBytes\Mermaid\GitGraph\Branch;
use BeastBytes\Mermaid\GitGraph\Checkout;
use BeastBytes\Mermaid\GitGraph\Commit;
use BeastBytes\Mermaid\GitGraph\CommitType;
use BeastBytes\Mermaid\GitGraph\GitGraph;
use BeastBytes\Mermaid\GitGraph\Merge;

test('GitGraph test', function () {
    expect(
        (new GitGraph())
            ->withItem(
                $commit = new Commit(),
                $branchHotfix = new Branch('hotfix'),
                $checkoutHotfix = new Checkout($branchHotfix),
                $commit,
                $develop = new Branch('develop'),
                $checkoutDevelop = new Checkout($develop),
                new Commit('ash', 'abc'),
                $featureB = new Branch('featureB'),
                $checkoutFeatureB = new Checkout($featureB),
                new Commit(type: CommitType::Highlight),
                $checkoutMain = new Checkout(),
                $checkoutHotfix,
                $commit,
                new Checkout($develop),
                new Commit(type: CommitType::Reverse),
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
        ->toBe("<pre class=\"mermaid\">\n"
            . "gitGraph LR:\n"
            . "  commit\n"
            . "  branch hotfix\n"
            . "  checkout hotfix\n"
            . "  commit\n"
            . "  branch develop\n"
            . "  checkout develop\n"
            . "  commit id:&quot;ash&quot; tag:&quot;abc&quot;\n"
            . "  branch featureB\n"
            . "  checkout featureB\n"
            . "  commit type:HIGHLIGHT\n"
            . "  checkout main\n"
            . "  checkout hotfix\n"
            . "  commit\n"
            . "  checkout develop\n"
            . "  commit type:REVERSE\n"
            . "  checkout featureB\n"
            . "  commit\n"
            . "  checkout main\n"
            . "  merge hotfix\n"
            . "  checkout featureB\n"
            . "  commit\n"
            . "  checkout develop\n"
            . "  branch featureA\n"
            . "  commit\n"
            . "  checkout develop\n"
            . "  merge hotfix\n"
            . "  checkout featureA\n"
            . "  commit\n"
            . "  checkout featureB\n"
            . "  commit\n"
            . "  checkout develop\n"
            . "  merge featureA\n"
            . "  branch release\n"
            . "  checkout release\n"
            . "  commit\n"
            . "  checkout main\n"
            . "  commit\n"
            . "  checkout release\n"
            . "  merge main\n"
            . "  checkout develop\n"
            . "  merge release\n"
            . '</pre>'
    );
});
