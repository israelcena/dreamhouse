<?php

declare(strict_types=1);

function formatMoney(float $money): string
{
  return "R$ " . number_format($money, 2, ",", ".");
};