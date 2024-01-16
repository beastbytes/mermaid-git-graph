<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;

final class Checkout implements ItemInterface
{
    use CommentTrait;

    private const TYPE = 'checkout';

    public function __construct(private readonly ?Branch $branch = null)
    {
    }

    public function render(string $indentation): string
    {
        $output = [];

        $this->renderComment($indentation, $output);
        $output[] = $indentation . self::TYPE . ' ' . ($this->branch === null ? 'main' : $this->branch->getName());

        return implode("\n", $output);
    }
}
