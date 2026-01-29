<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

use BeastBytes\Mermaid\CommentTrait;
use Override;

final class Commit implements ItemInterface
{
    use CommentTrait;

    private const string COMMIT = 'commit%s%s%s';
    private const string ID = ' id:"%s"';
    private const string TAG = ' tag:"%s"';
    private const string TYPE = ' type:%s';

    public function __construct(
        private readonly ?string $id = null,
        private readonly ?string $tag = null,
        private readonly ?CommitType $type = null
    )
    {
    }

    /** @internal */
    public function getId(): ?string
    {
        return $this->id;
    }

    #[Override]
    public function render(string $indentation): string
    {
        $output = [];

        $output[] = $this->renderComment($indentation);
        $output[] = $indentation . sprintf(
            self::COMMIT,
                is_string($this->id) ? sprintf(self::ID, $this->id) : '',
                $this->type instanceof CommitType ? sprintf(self::TYPE, $this->type->value) : '',
                is_string($this->tag) ? sprintf(self::TAG, $this->tag) : '',
        );

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}