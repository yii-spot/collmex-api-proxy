<?php

declare(strict_types=1);

namespace App\Repository\Collmex\Converter;

use DateTimeImmutable;

class DateTimeConverter implements DateTimeConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convertDateString(string $dateString, string $format = self::DEFAULT_DATE_TIME_FORMAT)
    {
        $date = DateTimeImmutable::createFromFormat("Ymd H:i:s", "{$dateString} 00:00:00");

        return $date->format($format);
    }
}