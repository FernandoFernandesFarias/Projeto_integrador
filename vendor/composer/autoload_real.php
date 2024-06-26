<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdd238b208b3c9bb648f9d5d80c9ecb5b
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

        spl_autoload_register(array('ComposerAutoloaderInitdd238b208b3c9bb648f9d5d80c9ecb5b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdd238b208b3c9bb648f9d5d80c9ecb5b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdd238b208b3c9bb648f9d5d80c9ecb5b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
