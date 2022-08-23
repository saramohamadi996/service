<?php


namespace Service\Service\Http\Traits;

use Service\Category\Models\Category;

trait getAll
{
    /**
     * @return array
     */
    public function getAll()
    {
        $categories = Category::all();
        $nodes =[];
        foreach ($categories as $key => $category){
            if (!Category::where('parent_id', $category->id)->first())
                $nodes[$key] = $category->id;
        }
        return $nodes;
    }
}
