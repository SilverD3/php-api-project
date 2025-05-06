<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\FileManager;

/**
 * File validation constraints
 */
enum FileType
{
  case IMAGE;
  case VIDEO;
  case PDF;
  case EXCEL;
  case WORD;
  case ARCHIVE;
  case AUDIO;
  case UNKNOWN;
}
