<?php

namespace Helpers;

class Folio {
  public int $id;
  public string $folio_interno;
  public string $identificador;
  public string $rfc;
  public string $fecha_hora;
  public string $doc;
  public int $id_doc;
  public int $id_ape;
  public string $tipo_doc;
  public string $oficio_entrega;
  public string $balcompmen;
  public string $auxcontmen;
  public string $estcuenban;
  public string $conbanmen;
  public string $relautrecfin;
  public string $relnomapcue;
  public string $contfolrecap;
  public string $paltramen;
  public string $int_pasivos;
  public string $relcuepa;
  public string $contapecn;
  public string $ofiformuti;
  public string $espcolviapu;
  public string $relprouma;
  public string $invbienmue;
  public int $id_pat;

  public function __construct() {

  }

  public function setId(int $id): self {
    $this->id = $id;
    return $this;
  }

  public function setFolioInterno(string $folio_interno): self {
    $this->folio_interno = $folio_interno;
    return $this;
  }

  public function setIdentificador(string $identificador): self {
    $this->identificador = $identificador;
    return $this;
  }

  public function setRfc(string $rfc): self {
    $this->rfc = $rfc;
    return $this;
  }

  public function setFechaHora(string $fecha_hora): self {
    $this->fecha_hora = $fecha_hora;
    return $this;
  }

  public function setDoc(string $doc): self {
    $this->doc = $doc;
    return $this;
  }

  public function setIdDoc(int $id_doc): self {
    $this->id_doc = $id_doc;
    return $this;
  }

  public function setIdApe(int $id_ape): self {
    $this->id_ape = $id_ape;
    return $this;
  }

  public function setTipoDoc(string $tipo_doc): self {
    $this->tipo_doc = $tipo_doc;
    return $this;
  }

  public function setOficioEntrega(string $oficio_entrega): self {
    $this->oficio_entrega = $oficio_entrega;
    return $this;
  }

  public function setBalcompmen(string $balcompmen): self {
    $this->balcompmen = $balcompmen;
    return $this;
  }

  public function setAuxcontmen(string $auxcontmen): self {
    $this->auxcontmen = $auxcontmen;
    return $this;
  }

  public function setEstcuenban(string $estcuenban): self {
    $this->estcuenban = $estcuenban;
    return $this;
  }

  public function setConbanmen(string $conbanmen): self {
    $this->conbanmen = $conbanmen;
    return $this;
  }

  public function setRelautrecfin(string $relautrecfin): self {
    $this->relautrecfin = $relautrecfin;
    return $this;
  }

  public function setRelnomapcue(string $relnomapcue): self {
    $this->relnomapcue = $relnomapcue;
    return $this;
  }

  public function setContfolrecap(string $contfolrecap): self {
    $this->contfolrecap = $contfolrecap;
    return $this;
  }

  public function setPaltramen(string $paltramen): self {
    $this->paltramen = $paltramen;
    return $this;
  }

  public function setIntPasivos(string $int_pasivos): self {
    $this->int_pasivos = $int_pasivos;
    return $this;
  }

  public function setRelcuepa(string $relcuepa): self {
    $this->relcuepa = $relcuepa;
    return $this;
  }

  public function setContapecn(string $contapecn): self {
    $this->contapecn = $contapecn;
    return $this;
  }

  public function setOfiformuti(string $ofiformuti): self {
    $this->ofiformuti = $ofiformuti;
    return $this;
  }

  public function setEspcolviapu(string $espcolviapu): self {
    $this->espcolviapu = $espcolviapu;
    return $this;
  }

  public function setRelprouma(string $relprouma): self {
    $this->relprouma = $relprouma;
    return $this;
  }

  public function setInvbienmue(string $invbienmue): self {
    $this->invbienmue = $invbienmue;
    return $this;
  }

  public function setIdPat(int $id_pat): self {
    $this->id_pat = $id_pat;
    return $this;
  }
}