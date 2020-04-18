<?php

class TextlongPage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
