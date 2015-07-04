<?php namespace Stu177\Events\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use ApplicationException;
use Stu177\Events\Models\Event;

/**
 * Events Back-end Controller
 */
class Events extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Stu177.Events', 'events', 'events');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $eventId) {


                if ((!$event = Event::find($eventId)))
                    continue;

                $event->delete();
            }

            Flash::success('Successfully deleted event(s).');
        }

        return $this->listRefresh();
    }

}
