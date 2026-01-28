<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

enum CommitType: string
{
    case highlight = 'HIGHLIGHT';
    case normal = 'NORMAL';
    case reverse = 'REVERSE';
}