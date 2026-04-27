<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

enum BraceTypes: string
{
    case TYPE_1_OPEN = '{';
    case TYPE_1_CLOSE ='}';

    case TYPE_2_OPEN = '[';
    case TYPE_2_CLOSE =']';

    case TYPE_3_OPEN = '(';
    case TYPE_3_CLOSE =')';

    public static function provideTypes(): array
    {
        return [
            self::TYPE_1_OPEN->value => self::TYPE_1_CLOSE->value,
            self::TYPE_2_OPEN->value => self::TYPE_2_CLOSE->value,
            self::TYPE_3_OPEN->value => self::TYPE_3_CLOSE->value
        ];
    }
}
