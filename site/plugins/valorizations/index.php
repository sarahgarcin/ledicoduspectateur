<?php

// Page methods
page::$methods['rewriteUrlforValorization'] = function($page, $uri = '/') {
  $url = url::home();
  if( $page->site()->isValorization($site) ) $url .= '/' . $page->site()->getValorization($site)->uid();
  if( !$page->isHomepage() ) $url .= '/' . $uri;
  $page->site()->isValorization();
  return $url;
};

// Site methods
site::$methods['isValorization'] = function($site) {
  return $site->getValorization($site) ? true : false;
};

site::$methods['getValorization'] = function($site) {
  $url = str::split($_SERVER['REQUEST_URI'], '/');
  $page = false;
  if($url[0]) $page = page(c::get('valorizations.uri', 'valorisations') . '/'. $url[0]);
  if(!$page && $url[1]) $page = page(c::get('valorizations.uri', 'valorisations') . '/'. $url[1]);
  return $page;
};

site::$methods['menu'] = function($site) {
  $collection = $site->pages();
  if($site->isValorization($site)) $collection = pages(['about','definitions',$site->getValorization($site)]);
  return $collection->listed();
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
