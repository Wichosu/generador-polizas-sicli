<?php

namespace Helpers;

class Pat {
  public int $id;
  public int $id_ape;
  public string $nombre;
  public string $objetivos;
  public string $metas;
  public string $justificacion;

  public function __construct() {

  }

  public function setId(int $id): self {
    $this->id = $id;
    return $this;
  }

  public function setIdApe(int $id_ape): self {
    $this->id_ape = $id_ape;
    return $this;
  }

  public function setNombre(string $nombre): self {
    $this->nombre = $nombre;
    return $this;
  }

  public function setObjetivos(string $objetivos): self {
    $this->objetivos = $objetivos;
    return $this;
  }

  public function setMetas(string $metas): self {
    $this->metas = $metas;
    return $this;
  }

  public function setJustificacion(string $justificacion): self {
    $this->justificacion = $justificacion;
    return $this;
  }
}