<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit233565652ca14bd05045cdfc936058bf
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit233565652ca14bd05045cdfc936058bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit233565652ca14bd05045cdfc936058bf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
