<?php

class SouspagePage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
