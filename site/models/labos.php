<?php

class LabosPage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
