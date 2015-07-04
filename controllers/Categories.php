<?php namespace Stu177\Events\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use Stu177\Events\Models\Category;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
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

        BackendMenu::setContext('Stu177.Events', 'events', 'categories');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $catId) {


                if ((!$cat = Category::find($catId)))
                    continue;

                $cat->delete();
            }

            Flash::success('Successfully deleted category(ies).');
        }

        return $this->listRefresh();
    }
}
