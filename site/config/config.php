<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('environment', 'local');
c::set('debug', true);

c::set('languages', array(
  // array(
  //   'code'    => 'en',
  //   'name'    => 'English',
  //   'locale'  => 'en_US',
  //   'url'     => '/en',
  // ),
  array(
    'code'    => 'fr',
    'name'    => 'Français',
    'default' => true,
    'locale'  => 'fr_FR',
    'url'     => '/',
  ),
));

c::set('multisizes', true);
c::set('lazyloadimages', true);
c::get('optimumx', 1.6);

c::set('smartypants', true);
c::set('smartypants.doublequote.open', '&#8220;');                              // Openning smart double-quotes.
c::set('smartypants.doublequote.close', '&#8221;');                             // Closing smart double-quotes.
c::get('smartypants.space.frenchquote', '&#160;');                              // Space inside french quotes. "Voici la «_chose_» qui m'a attaqué."


// resize image on upload
kirby()->hook('panel.file.upload', 'resizeImage');
kirby()->hook('panel.file.replace', 'resizeImage');

function resizeImage($file) {
  // set a max. dimension
  $maxDimension = 2000;
  try {
    // check file type and dimensions
    if ($file->type() == 'image' and ($file->width() > $maxDimension or $file->height() > $maxDimension)) {

      // get the original file path
      $originalPath = $file->dir() . '/' . $file->filename();
      // create a thumb and get its path
      $resizedImage = $file->resize($maxDimension, $maxDimension);
      $resizedPath = $resizedImage->dir() . '/' . $resizedImage->filename();
      // replace the original image with the resized one
      copy($resizedPath, $originalPath);
      unlink($resizedPath);
      }
  } catch (Exception $e) {
      return response::error($e->getMessage());
  }
}

