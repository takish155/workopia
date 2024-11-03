<?php

namespace Framework;

class Session
{
  /**
   * Start the session
   * 
   * @return void
   */

  public static function start()
  {
    if (session_start() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Set a session key/value pair
   * 
   * @param string $key
   * @param mixed $value
   * @return void
   */
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Get a session value by key
   * 
   * @param string $key
   * @param mixed $default
   * @return mixed
   */
  public static function get($key, $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  /**
   * Check if session key exist
   * 
   * @param string $key
   * @return bool
   * 
   */
  public static function has($key)
  {
    return isset($_SESSION[$key]);
  }

  /**
   * Clear session by key
   * 
   * @param string $key
   * @return void
   */
  public static function clear($key)
  {
    if (Session::has($key)) {
      unset($_SESSION[$key]);
    }
  }

  /**
   * Clear all session data
   * 
   * @return void
   */
  public static function clearAll()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Authenticate the user
   * 
   * @param string $userId
   * @param string $name
   * @param string $email
   * @param string $city
   * @param string $prefecture
   * @return void
   */
  public static function authenticate($userId, $name, $email, $city, $prefecture)
  {
    Session::set("user", [
      "id" => $userId,
      "name" => $name,
      "email" => $email,
      "city" => $city,
      "prefecture" => $prefecture,
    ]);

    redirect("/");
    return;
  }
}
