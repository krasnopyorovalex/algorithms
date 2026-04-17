<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

use SplStack;
use Src\Linter\Linter;

final readonly class BracesLinter implements Linter
{
    private const array BRACES_MAP = [
        '{' => '}',
        '[' => ']',
        '(' => ')'
    ];

    public function __construct(private SplStack $stack) {}

    /**
     * @param string<non-empty-string> $braces
     */
    public function check(string $braces): bool
    {
        if (!$length = strlen($braces)) {
            return false;
        }

        for ($i = 0; $i < $length; $i++) {
            $brace = new Brace($braces[$i]);

            if (!$brace->isOpen(self::BRACES_MAP) && $this->stack->isEmpty()) {
                return false;
            }

            if ($brace->isOpen(self::BRACES_MAP)) {
                $this->stack->push($brace->char);
                continue;
            }

            $popBrace = $this->stack->pop();
            if (!$brace->isValidClose(self::BRACES_MAP[$popBrace])) {
                return false;
            }
        }

        return $this->stack->isEmpty();
    }
}
