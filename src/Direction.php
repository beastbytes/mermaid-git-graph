<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\GitGraph;

enum Direction: string
{
    case bt = 'BT';
    case lr = 'LR';
    case tb = 'TB';
}