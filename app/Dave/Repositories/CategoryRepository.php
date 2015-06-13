<?php namespace App\Dave\Repositories;

use \App\Category as Category;

class CategoryRepository implements ICategoryRepository
{
    public function categories($search)
    {
        if(!is_null($search) && !empty($search))
        {
            $categories = Category::where('name', 'like', '%'.$search.'%')->paginate(6);
        } else {
            $categories = Category::paginate(6);
        }

        return $categories;
    }

    public function store($input)
    {
        $category = new Category();

        $category->name = $input['name'];

        $result = $category->save();

        return $result;
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function update($input, $id)
    {
        $category = $this->show($id);

        $category->name = $input['name'];

        $result = $category->save();

        return $result;
    }

    public function destroy($id)
    {
        $category = $this->show($id);

        $result = $category->delete();

        return $result;
    }

    public function categoriesForSelect()
    {
        $categories = Category::all();

        return $categories->lists('name', 'id');
    }

}