<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7fcf0da26fd0ccdf239ee9e66d09d90a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit7fcf0da26fd0ccdf239ee9e66d09d90a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7fcf0da26fd0ccdf239ee9e66d09d90a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7fcf0da26fd0ccdf239ee9e66d09d90a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
