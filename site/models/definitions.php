<?php

class DefinitionsPage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
