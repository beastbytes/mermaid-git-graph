<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use InvalidArgumentException;

final class Cherrypick implements ItemInterface
{
    private const TYPE = 'cherrypick';

    public function __construct(private readonly Commit $commit)
    {
    }

    public function render(string $indentation): string
    {
        return $indentation . self::TYPE . ' id:"' . $this->commit->getId() . '"' ;
    }
}
