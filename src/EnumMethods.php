<?php

namespace Fatihirday\EnumMethods;

trait EnumMethods
{
    /**
     * @param string|null $operator
     * @return string|array
     */
    public static function names(?string $operator = null): string|array
    {
        $names = array_column(self::cases(), 'name');

        return is_null($operator) ? $names : implode($operator, $names);
    }

    /**
     * @param string|null $operator
     * @return string|array
     */
    public static function values(?string $operator = null): string|array
    {
        $values = array_column(self::cases(), 'value');

        return is_null($operator) ? $values : implode($operator, $values);
    }

    /**
     * @param string|null $key
     * @return array
     * @throws \Exception
     */
    public static function toArray(?string $key = 'name'): array
    {
        self::validation(strtolower($key), ['name', 'value']);

        $variables = match (strtolower($key)) {
            'name' => [self::names(), self::values()],
            'value' => [self::values(), self::names()]
        };

        return array_combine(...$variables);
    }

    /**
     * @param string $option
     * @param array $parameters
     * @return void
     * @throws \Exception
     */
    private static function validation(string $option, array $parameters): void
    {
        if (!in_array(strtolower($option), $parameters)) {
            $message = ['Error Parameter :', $option, '. options'];
            $message[] = join('|', $parameters);
            throw new \Exception(join(' ', $message), 500);
        }
    }
}
