<?php

namespace Helpers;

class Ape {
  public int $id;
  public string $nombre;
  public string $rfc;
  public string $sufijo;
  public string $presidente;
  public string $titular;
  public string $telefono;
  public string $email;
  public string $pagina;
  public string $direccion;
  public string $colonia;
  public string $ciudad;
  public string $estado;
  public string $cp;
  public string $mision;
  public string $vision;
  public string $logo;
  public string $status;
  public string $identificador;
  public string $sello_digital;

  public function __construct() {

  }

  public function setId(int $id) {
    $this->id = $id;
    return $this;
  }

  public function setNombre(string $nombre) {
    $this->nombre = $nombre;
    return $this;
  }

  public function setRfc(string $rfc) {
    $this->rfc = $rfc;
    return $this;
  }

  public function setSufijo(string $sufijo) {
    $this->sufijo = $sufijo;
    return $this;
  }

  public function setPresidente(string $presidente) {
    $this->presidente = $presidente;
    return $this;
  }

  public function setTitular(string $titular) {
    $this->titular = $titular;
    return $this;
  }
  
  public function setTelefono(string $telefono) {
    $this->telefono = $telefono;
    return $this;
  }

  public function setEmail(string $email) {
    $this->email = $email;
    return $this;
  }

  public function setPagina(string $pagina) {
    $this->pagina = $pagina;
    return $this;
  }

  public function setDireccion(string $direccion) {
    $this->direccion = $direccion;
    return $this;
  }

  public function setColonia(string $colonia) {
    $this->colonia = $colonia;
    return $this;
  }

  public function setCiudad(string $ciudad) {
    $this->ciudad = $ciudad;
    return $this;
  }

  public function setEstado(string $estado) {
    $this->estado = $estado;
    return $this;
  }

  public function setCp(string $cp) {
    $this->cp = $cp;
    return $this;
  }

  public function setMision(string $mision) {
    $this->mision = $mision;
    return $this;
  }

  public function setVision(string $vision) {
    $this->vision = $vision;
    return $this;
  }

  public function setLogo(string $logo) {
    $this->logo = $logo;
    return $this;
  }

  public function setStatus(string $status) {
    $this->status = $status;
    return $this;
  }

  public function setIdentificador(string $identificador) {
    $this->identificador = $identificador;
    return $this;
  }

  public function setSelloDigital(string $sello_digital) {
    $this->sello_digital = $sello_digital;
    return $this;
  }
}