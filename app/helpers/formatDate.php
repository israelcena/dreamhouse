<?php

declare(strict_types=1);

use Carbon\Carbon;

function formatDateTime(string $date): string
{
  return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i');
}