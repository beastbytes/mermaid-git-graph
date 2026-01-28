<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

interface ItemInterface
{
    public function render(string $indentation): string;
}