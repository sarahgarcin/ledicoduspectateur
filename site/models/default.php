<?php

class DefaultPage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
