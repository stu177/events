<?php namespace Stu177\Events;

use Backend;
use System\Classes\PluginBase;

/**
 * events Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Events',
            'description' => 'Events system',
            'author'      => 'stu177',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerNavigation()
    {
        return [
            'events' => [
                'label'       => 'Events',
                'url'         => Backend::url('stu177/events/events'),
                'icon'        => 'icon-calendar',
                'permissions' => ['stu177.event.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'events'    => [
                        'label'         => 'Events',
                        'icon'          => 'icon-calendar',
                        'url'           => Backend::url('stu177/events/events'),
                        'permissions'   => ['stu177.event.*']
                    ],
                    'categories'    => [
                        'label'         => 'Categories',
                        'icon'          => 'icon-tags',
                        'url'           => Backend::url('stu177/events/categories'),
                        'permissions'   => ['stu177.event.*']
                    ]
                ]
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'Stu177\Events\Components\ShowCategory' => 'showCategory',
            'Stu177\Events\Components\NextEvent' => 'nextEvent'
        ];
    }

}
