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

  // pass $articles and $linkeddefinitions to the template
  return compact('articles','linkeddefinitions');

};
