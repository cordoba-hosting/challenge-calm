<?php

namespace Challenge;
class Setup
{
    static function init()
    {
        add_action('init', [self::class, 'blockConsumeApiInit'] );
        add_action('admin_menu', [self::class, 'addAdminMenu']);

    }

    static function addAdminMenu()
    {
        /**
         * Main Page for plugin.
         */
        add_menu_page(
            'Challenge',
            'Challenge',
            'manage_options',
            'challenge-plugin',
            [self::class, 'display'],
            'dashicons-admin-tools',
            27
        );

        //settings
        add_submenu_page(
            'challenge-plugin',
            'View Demo',
            'View Demo',
            'manage_options',
            'opcion-slug',
            [self::class, 'displaySubMenu'],
            29
        );
    }

    static function display()
    {
        echo ABSPATH;
        echo 'display Challenge setup';
    }

    static function displaySubMenu()
    {
        echo 'display Sub Menu';
    }

    static function blockConsumeApiInit(){
        register_block_type( __DIR__ . '/../blocks/consume-api/build' );
    }
}
