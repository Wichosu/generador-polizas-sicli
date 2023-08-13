<?php

namespace Helpers;

use Helpers\encriptar;

class Pat {
  public object $ape_data;
  public object $folio;
  public object $pat_data;
  public array $lines;

  function __construct(object $ape_data, object $pat_data, array $lines, object $folio) {
    $this->ape_data = $ape_data;
    $this->pat_data = $pat_data;
    $this->$lines = $lines;
    $this->$folio = $folio;
  }

  function get_encripted_folio() {
    return encriptar($this->folio->folio_interno);
  }
}