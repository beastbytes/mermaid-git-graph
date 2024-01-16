<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use BeastBytes\Mermaid\RenderItemsTrait;
use BeastBytes\Mermaid\TitleTrait;
use Stringable;

final class GitGraph implements MermaidInterface, Stringable
{
    use CommentTrait;
    use RenderItemsTrait;
    use TitleTrait;

    private const TYPE = 'gitGraph';

    /** @psalm-var list<ItemInterface> $items */
    private array $items = [];

    public function __construct(
        public readonly Direction $direction = Direction::LR
    )
    {
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function addItem(ItemInterface ...$item)
    {
        $new = clone $this;
        $new->items = array_merge($new->items, $item);
        return $new;
    }

    public function withItem(ItemInterface ...$item)
    {
        $new = clone $this;
        $new->items = $item;
        return $new;
    }

    public function render(): string
    {
        $output = [];

        $this->renderTitle($output);
        $this->renderComment('', $output);
        $output[] = self::TYPE . ' ' . $this->direction->name . ':';
        $this->renderItems($this->items, '', $output);

        return Mermaid::render($output);
    }
}
