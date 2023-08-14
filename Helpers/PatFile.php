<?php

namespace Helpers;

use Helpers\Ape;
use Helpers\Folio;
use Helpers\Pat;

class PatFile {
  public Ape $ape;
  public Pat $pat;
  public array $lines;
  public Folio $folio;

  function __construct(Ape $ape, Pat $pat, array $lines, Folio $folio) {
    $this->ape = $ape;
    $this->pat = $pat;
    $this->lines = $lines;
    $this->folio = $folio;
  }

  public function getEncriptedFolio() {
    return encrypt($this->folio->folio_interno);
  }

}