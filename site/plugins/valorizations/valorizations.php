<?php

// Page methods
page::$methods['rewriteUrlforValorization'] = function($page, $uri = '/') {
  $url = url::home();
  if( $page->site()->isValorization() ) $url .= '/' . c::get('valorizations.uri', 'valorisations');
  if( !$page->isHomepage() ) $url .= '/' . $uri;
  return $url;
};

// Site methods
site::$methods['isValorization'] = function($site) {
  return strpos($_SERVER['REQUEST_URI'], '/' . c::get('valorizations.uri', 'valorisations')) === 0 ;
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
    'pattern' => c::get('valorizations.uri', 'valorisations') . '/(:all)',
    'action'  => function($all) {
      $page = page($all);
      if(!$page) $page = page( c::get('valorizations.uri', 'valorisations') . '/' . $all);
      if(!$page) $page = page('error');
      return $page;
    }
  )

]);
