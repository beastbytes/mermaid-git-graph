<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use Override;

final class Merge implements ItemInterface
{
    use CommentTrait;

    private const string MERGE = 'merge "%s"';

    public function __construct(private readonly Branch $branch)
    {
    }

    #[Override]
    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . sprintf(self::MERGE, $this->branch->getName());

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}