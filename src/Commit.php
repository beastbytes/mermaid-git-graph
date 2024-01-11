<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use RuntimeException;

final class Commit implements ItemInterface
{
    private const TYPE = 'commit';

    public function __construct(
        private readonly string $id = '',
        private readonly string $tag = '',
        private readonly CommitType $type = CommitType::Normal
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
        return $indentation
            . self::TYPE
            . ($this->id === '' ? '' : ' id:"' . $this->id . '"')
            . ($this->type === CommitType::Normal ? '' : ' type:' . $this->type->value)
            . ($this->tag === '' ? '' : ' tag:"' . $this->tag . '"')
        ;
    }
}
