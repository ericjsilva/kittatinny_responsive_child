<?php
/**
 * Header Template
 *
 * @file           functions.php
 * @package        Responsive
 * @author         Eric Silva
 * @copyright      2012-2014 Kittatinny Lodge 5, Order of the Arrow, BSA
 * @license        license.txt
 * @version        Release: 1.0
 * @since          available since Release 1.0
 */

function base_url() {
    return site_url();
}

add_shortcode('base_url', 'base_url');

function k5_loginout($subject) {
  if ( ! is_user_logged_in() ) {
    return str_replace('wp-login.php', 'login', $subject);
  }
  return $subject;
}

add_filter('loginout', 'k5_loginout');

?>
