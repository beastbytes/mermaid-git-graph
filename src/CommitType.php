<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

enum CommitType: string
{
    case Highlight = 'HIGHLIGHT';
    case Normal = 'NORMAL';
    case Reverse = 'REVERSE';
}
