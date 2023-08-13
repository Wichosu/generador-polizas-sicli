<?php

namespace Helpers;
class Pat {
  public object $ape_data;
  public object $pat_data;
  public array $lines;
  public object $folio;

  function __construct(object $ape_data, object $pat_data, array $lines, object $folio) {
    $this->ape_data = $ape_data;
    $this->pat_data = $pat_data;
    $this->lines = $lines;
    $this->folio = $folio;
  }

  public function getEncriptedFolio() {
    return encrypt($this->folio->folio_interno);
  }

}