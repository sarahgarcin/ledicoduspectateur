<?php

class PagePage extends Page {
  public function url() {
    return parent::rewriteUrlforValorization(parent::uri());
  }
}
