<?php

// Page methods
page::$methods['rewriteUrlforValorization'] = function($page, $uri = '/') {
  $url = url::home();
  if( $page->site()->isValorization() ) $url .= '/' . str::split($_SERVER['REQUEST_URI'], '/')[0];
  if( !$page->isHomepage() ) $url .= '/' . $uri;
  $page->site()->isValorization();
  return $url;
};

// Site methods
site::$methods['isValorization'] = function($site) {
  $pageValorization = page(c::get('valorizations.uri', 'valorisations') . '/'. str::split($_SERVER['REQUEST_URI'], '/')[0]);
  return $pageValorization ? true : false;
};

// Routes
kirby()->routes([

  array(
    'pattern' => c::get('valorizations.uri', 'valorisations'),
    'action'  => function() {
      site()->visit('error');
      return page('error');
    }
  ),

  array(
    'pattern' => '(:any)/(:all)',
    'action'  => function($valorization, $all) {
      $page = page($all);
      if(!$page) $page = page( $valorization . '/' . $all);
      if(!$page) $page = page('error');

      site()->visit($page);

      return $page;
    }
  )

]);
