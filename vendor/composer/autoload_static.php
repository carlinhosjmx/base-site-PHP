<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8cef095c8a55c375fa9f1e13abd8c83b
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
            'admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/_app',
        ),
        'admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8cef095c8a55c375fa9f1e13abd8c83b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8cef095c8a55c375fa9f1e13abd8c83b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}