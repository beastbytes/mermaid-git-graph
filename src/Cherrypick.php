<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use InvalidArgumentException;

final class Cherrypick implements ItemInterface
{
    use CommentTrait;

    private const TYPE = 'cherrypick';

    public function __construct(private readonly Commit $commit)
    {
    }

    public function render(string $indentation): string
    {
        $output = [];

        $this->renderComment($indentation, $output);
        $output[] = $indentation . self::TYPE . ' id:"' . $this->commit->getId() . '"';

        return implode("\n", $output);
    }
}
