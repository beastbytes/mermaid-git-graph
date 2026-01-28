<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use InvalidArgumentException;

final class Cherrypick implements ItemInterface
{
    use CommentTrait;

    private const string TYPE = 'cherrypick';

    public function __construct(private readonly Commit $commit)
    {
    }

    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . self::TYPE . ' id:"' . $this->commit->getId() . '"';

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}