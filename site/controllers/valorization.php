<?php

return function($site, $pages, $page) {

  // get all related pages
  $articles = $page->relatedPages()->toStructure();

  // get all linked definitions
  $linkeddefinitions = [];
  foreach ($articles as $article) {
    if($p = $article->relatedpage()->toPage()) {
      if( $p->linkeddefinition()->isNotEmpty() ) $linkeddefinitions = array_merge($linkeddefinitions, $p->linkeddefinition()->split(','));
    }
  }

  usort($linkeddefinitions, function($a, $b) use ($pages) {
    $pa = $pages->find('definitions/'.$a);
    $pb = $pages->find('definitions/'.$b);
    return strcmp($pa->title()->slug()->upper()->toString()[0], $pb->title()->slug()->upper()->toString()[0]);
  });

  // pass $articles and $linkeddefinitions to the template
  return compact('articles','linkeddefinitions');

};
