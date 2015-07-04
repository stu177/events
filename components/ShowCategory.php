<?php namespace Stu177\Events\Components;

use Cms\Classes\ComponentBase;
use Stu177\Events\Models\Event as Event;
use Stu177\Events\Models\Category as Category;

class ShowCategory extends ComponentBase
{
    public $events;
    public $category;

    public function componentDetails()
    {
        return [
            'name'        => 'Event Category',
            'description' => 'Lists all events in a category'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Category',
                'type' => 'dropdown'
            ]
        ];
    }

    public function getCategoryOptions()
    {
        $options = Category::all(['id', 'title'])->toArray();

        foreach($options as $option) {
            $categoryArray[$option['id']] = $option['title'];
        }

        return $categoryArray;
    }

    public function getCategory()
    {
        $id = (int) $this->property('category');

        $category = Category::get()->where('id', $id)->first();

        return $category;
    }

    public function getEvents()
    {
        $categoryId = (int) $this->property('category');

        $events = Event::all()->where('category_id', $categoryId);

        return $events;
    }

}
