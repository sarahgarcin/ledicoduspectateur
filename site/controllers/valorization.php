<?php

return function($site, $pages, $page) {

  // get all related pages
  $articles = $page->relatedPages()->toStructure();


  // pass $articles to the template
  return compact('articles');

};
