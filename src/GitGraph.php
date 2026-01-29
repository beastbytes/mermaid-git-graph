<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Diagram;
use BeastBytes\Mermaid\RenderItemsTrait;

final class GitGraph extends Diagram
{
    use CommentTrait;
    use RenderItemsTrait;

    private const string TYPE = 'gitGraph';

    /** @psalm-var list<ItemInterface> $items */
    private array $items = [];

    public function __construct(public readonly Direction $direction = Direction::lr)
    {
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

    protected function renderDiagram(): string
    {
        $output = [];

        $output[] = $this->renderComment('');
        $output[] = self::TYPE . ' ' . $this->direction->value . ':';
        $output[] = $this->renderItems($this->items, '');

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}
