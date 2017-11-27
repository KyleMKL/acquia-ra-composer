<?php

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}

$APP_NAME = '%%APP_NAME%%';
$REMOTE_HOST_DEV = '%%REMOTE_HOST_DEV%%';
$REMOTE_HOST_TEST = '%%REMOTE_HOST_TEST%%';

//Dev
$aliases['dev'] = array(
  'root' => '/var/www/html/'.$APP_NAME.'.dev/docroot',
  'ac-site' => $APP_NAME,
  'ac-env' => 'dev',
  'ac-realm' => 'devcloud',
  'uri' => $REMOTE_HOST_DEV.'.devcloud.acquia-sites.com',
  'remote-host' => $REMOTE_HOST_DEV.'.ssh.devcloud.acquia-sites.com',
  'remote-user' => 'drupal84composer.dev',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  ),
);
$aliases['dev.livedev'] = array(
  'parent' => '@'.$APP_NAME.'.dev',
  'root' => '/mnt/gfs/'.$APP_NAME.'.dev/livedev/docroot',
);


//Test
if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}

$aliases['test'] = array(
  'root' => '/var/www/html/'.$APP_NAME.'.test/docroot',
  'ac-site' => $APP_NAME,
  'ac-env' => 'test',
  'ac-realm' => 'devcloud',
  'uri' => $REMOTE_HOST_TEST.'.devcloud.acquia-sites.com',
  'remote-host' => $REMOTE_HOST_TEST.'.ssh.devcloud.acquia-sites.com',
  'remote-user' => $APP_NAME.'.test',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  ),
);
$aliases['test.livedev'] = array(
  'parent' => '@'.$APP_NAME.'.test',
  'root' => '/mnt/gfs/'.$APP_NAME.'.test/livedev/docroot',
);
