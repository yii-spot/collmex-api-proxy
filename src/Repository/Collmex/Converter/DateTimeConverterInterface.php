<?php

namespace App\Repository\Collmex\Converter;

interface DateTimeConverterInterface
{
    public const DEFAULT_DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    /**
     * @param string $dateString
     * @param string $format
     * @return string
     */
    public function convertDateString(string $dateString, string $format = self::DEFAULT_DATE_TIME_FORMAT);
}