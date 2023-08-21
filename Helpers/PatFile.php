<?php

namespace Helpers;

use Helpers\Ape;
use Helpers\Folio;
use Helpers\Pat;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\QRCode;

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

  public function getEncriptedFolio(): string {
    return encrypt($this->folio->folio_interno);
  }

  public function getQrCode(): QRcode {
    $options = new QROptions;
    $options->version = 7;
    $options->imageBased64 = true;

    $data = 'RFC | '.$this->folio->fecha_hora.' | 000004F75T9MG21 | '.$this->getEncriptedFolio();

    return (new QRCode)->render($data);
  }

}