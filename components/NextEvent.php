<?php namespace Stu177\Events\Components;

use Cms\Classes\ComponentBase;
use Stu177\Events\Models\Event as Event;
use Stu177\Events\Models\Category as Category;

class NextEvent extends ComponentBase
{
    public $events;
    public $category;

    public function componentDetails()
    {
        return [
            'name'        => 'Next Event',
            'description' => 'Gets the next upcoming event, can filter by category'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Category (Optional)',
                'type' => 'dropdown'
            ]
        ];
    }

    public function onRun()
    {
        $this->page['category'] = Category::where('id', $this->property('category'))->first();
    }

    public function getCategoryOptions()
    {
        $options = Category::all(['id', 'title'])->toArray();

        foreach($options as $option) {
            $categoryArray[$option['id']] = $option['title'];
        }

        return $categoryArray;
    }

    public function getNextEvent()
    {
        $categoryId = (int) $this->property('category');

        $event = Event::where('category_id', $categoryId)->orderBy('startDate', 'asc')->first();

        return $event;
    }

}
