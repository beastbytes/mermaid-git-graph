<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use InvalidArgumentException;
use Override;

final class Branch implements ItemInterface
{
    use CommentTrait;

    public const string DEFAULT_BRANCH = 'main';
    private const string BRANCH = 'branch "%s"%s';
    private const string ORDER = ' order:%s';

    public function __construct(
        private readonly string $name = self::DEFAULT_BRANCH,
        private readonly ?int $order = null
    )
    {
        if (is_int($this->order) && $this->order < 1) {
            throw new InvalidArgumentException('`order` must be greater than 0');
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    #[Override]
    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . sprintf(
            self::BRANCH,
            $this->name,
            is_int($this->order) ? sprintf(self::ORDER, $this->order) : ''
        );

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}