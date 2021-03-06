<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58454f14dd886a4d559f119bd1d99a6a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SideInc\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SideInc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58454f14dd886a4d559f119bd1d99a6a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58454f14dd886a4d559f119bd1d99a6a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
