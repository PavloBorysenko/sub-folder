<?php
class Singleton {
  private static $instance;
  
  private function __construct() {}
  
  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Singleton();
    }
    return self::$instance;
  }
}

//напиши  рекурсивную  очистку через sanitize_text_field  массива $_GET вместе с ключами
function sanitize_array_recursive(&$array) {
  foreach ($array as $key => &$value) {
      if (is_array($value)) {
          sanitize_array_recursive($value);
      } else {
          $value = sanitize_text_field($value);
      }
      $key = sanitize_text_field($key);
  }
  unset($value);
  unset($key);
}
sanitize_array_recursive($_GET);