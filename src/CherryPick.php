<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use InvalidArgumentException;
use Override;

final class CherryPick implements ItemInterface
{
    use CommentTrait;

    private const string CHERRYPICK = 'cherry-pick id:"%s"';
    private const string EXCEPTION = 'commit must have an id';

    public function __construct(private readonly Commit $commit)
    {
        if ($this->commit->getId() === null) {
            throw new InvalidArgumentException(self::EXCEPTION);
        }
    }

    #[Override]
    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . sprintf(self::CHERRYPICK, $this->commit->getId());

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}