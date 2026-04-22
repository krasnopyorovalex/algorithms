<?php

declare(strict_types=1);

namespace Src\Linter\Braces;

use SplStack;
use Src\Linter\Linter;

final readonly class BracesLinter implements Linter
{
    public function __construct(private SplStack $stack) {}

    /**
     * @param string<non-empty-string> $braces
     */
    public function check(string $braces): bool
    {
        if (!$length = strlen($braces)) {
            return true;
        }

        for ($i = 0; $i < $length; $i++) {
            $brace = new Brace($braces[$i]);

            if (!$brace->isOpen() && $this->stack->isEmpty()) {
                return false;
            }

            if ($brace->isOpen()) {
                $this->stack->push($brace);
                continue;
            }

            /** @var Brace $popBrace */
            $popBrace = $this->stack->pop();
            if (!$popBrace->isValidOpenFor($brace)) {
                return false;
            }
        }

        return $this->stack->isEmpty();
    }
}
