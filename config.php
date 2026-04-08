<?php
/**
 * Environment Configuration Loader
 * Loads variables from .env file
 */

class Config {
    private static $env = [];
    private static $loaded = false;

    public static function load($envFile = '.env') {
        if (self::$loaded) {
            return;
        }

        $envPath = __DIR__ . DIRECTORY_SEPARATOR . $envFile;

        if (!file_exists($envPath)) {
            return;
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Skip comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Parse key=value
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                // Remove quotes if present
                if ((strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) ||
                    (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1)) {
                    $value = substr($value, 1, -1);
                }

                self::$env[$key] = $value;
                putenv("$key=$value");
            }
        }

        self::$loaded = true;
    }

    public static function get($key, $default = null) {
        if (!self::$loaded) {
            self::load();
        }

        return isset(self::$env[$key]) ? self::$env[$key] : $default;
    }

    public static function all() {
        if (!self::$loaded) {
            self::load();
        }

        return self::$env;
    }
}

// Automatically load .env file
Config::load();
?>
