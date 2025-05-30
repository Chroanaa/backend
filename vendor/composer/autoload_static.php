<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74db06111fa1965b96678a4d3cb2c843
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74db06111fa1965b96678a4d3cb2c843::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74db06111fa1965b96678a4d3cb2c843::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit74db06111fa1965b96678a4d3cb2c843::$classMap;

        }, null, ClassLoader::class);
    }
}
