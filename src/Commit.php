<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use RuntimeException;

final class Commit implements ItemInterface
{
    use CommentTrait;

    private const string TYPE = 'commit';

    public function __construct(
        private readonly string $id = '',
        private readonly string $tag = '',
        private readonly CommitType $type = CommitType::normal
    )
    {
    }

    public function getId(): string
    {
        if ($this->id === '') {
            throw new RuntimeException('Commit id not set');
        }

        return $this->id;
    }

    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation
            . self::TYPE
            . ($this->id === '' ? '' : ' id:"' . $this->id . '"')
            . ($this->type === CommitType::normal ? '' : ' type:' . $this->type->value)
            . ($this->tag === '' ? '' : ' tag:"' . $this->tag . '"')
        ;

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}