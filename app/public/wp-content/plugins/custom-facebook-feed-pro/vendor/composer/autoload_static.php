<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9e091f5841710d67fca66267d4d1a2d1
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CustomFacebookFeed\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CustomFacebookFeed\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9e091f5841710d67fca66267d4d1a2d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9e091f5841710d67fca66267d4d1a2d1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}