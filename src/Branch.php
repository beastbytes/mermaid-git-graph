<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use InvalidArgumentException;

final class Branch implements ItemInterface
{
    use CommentTrait;

    private const TYPE = 'branch';

    public function __construct(private readonly string $name, private readonly ?int $order = null)
    {
        if (is_int($this->order) && $this->order < 1) {
            throw new InvalidArgumentException('`order` must be greater than 0');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(string $indentation): string
    {
        $output = [];

        $this->renderComment($indentation, $output);
        $output[] = $indentation
            . self::TYPE
            . ' ' . $this->name
            . ($this->order === null ? '' : ' order: ' . $this->order)
        ;

        return implode("\n", $output);
    }
}
