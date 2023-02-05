<?php

namespace Fatihirday\EnumMethods;

trait EnumMethods
{
    /**
     * @param bool $reverse
     * @return array
     */
    public static function toArray(bool $reverse = false): array
    {
        return $reverse
            ? array_column(self::cases(), 'name', 'value')
            : array_column(self::cases(), 'value', 'name');
    }

    /**
     * @param bool $reverse
     * @return object
     */
    public static function toObject(bool $reverse = false): object
    {
        return (object)self::toArray($reverse);
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function tryFromName(string $name): bool
    {
        return array_key_exists(strtoupper($name), self::toArray());
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public static function getValueByName(string $name): mixed
    {
        return self::tryFromName($name) ? self::toArray()[strtoupper($name)] : null;
    }

    /**
     * @param string|int $value
     * @return string|null
     */
    public static function getNameByValue(string|int $value): ?string
    {
        $get = self::tryFrom($value);

        return $get?->name ?? null;
    }

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
}
