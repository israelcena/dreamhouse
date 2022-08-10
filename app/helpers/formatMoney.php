<?php

declare(strict_types=1);

use \NumberFormatter;

function formatMoney(float $money): string
{
  $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);

  return $formatter->formatCurrency($money, 'BRL');
}