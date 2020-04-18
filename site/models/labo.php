<?php

class LaboPage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
