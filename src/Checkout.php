<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;

final class Checkout implements ItemInterface
{
    use CommentTrait;

    private const string TYPE = 'checkout';

    public function __construct(private readonly ?Branch $branch = null)
    {
    }

    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . self::TYPE . ' ' . ($this->branch === null ? 'main' : $this->branch->getName());

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}