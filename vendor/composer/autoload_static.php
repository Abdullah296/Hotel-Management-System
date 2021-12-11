<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e300541a02655af204bd17868824b9b
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e300541a02655af204bd17868824b9b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e300541a02655af204bd17868824b9b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3e300541a02655af204bd17868824b9b::$classMap;

        }, null, ClassLoader::class);
    }
}
