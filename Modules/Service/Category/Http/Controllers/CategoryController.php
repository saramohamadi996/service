<?php

namespace Service\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Service\Category\Http\Requests\Store;
use Service\Category\Http\Requests\Update;
use Illuminate\Http\RedirectResponse;
use Service\Category\Models\Category;
use Illuminate\Contracts\View\View;
use Service\Category\Http\Traits;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use Traits\uploadFileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        //
    }

    /**
     * it shows all categories.
     *
     * @param $parent_id
     * @return View
     */
    protected function view($parent_id):View
    {
        $categories = Category::where('parent_id', $parent_id)->latest()->paginate(11);
        return view('Categories::en.view',
            compact('categories', 'parent_id'));
    }

    /**
     * it shows the create form.
     *
     * @param $parent_id
     * @return View
     */
    public function add($parent_id):View
    {
        return view('Categories::en.add', compact('parent_id'));
    }

    /**
     * it saves the created category.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function store(Store $store):RedirectResponse
    {
        if ($store->hasFile('image')) {
            $image = $this->uploadFile($store->file('image'),
            'public/upload/category/image');
        }
        $parent=Category::find($store['parent_id']);
        $depth=$store['parent_id']==0?1:$parent->depth+1;
        Category::create([
            'description'=>$store['description'],
            'parent_id' => $store['parent_id'],
            'title' => $store['title'],
            'slug' =>$store['slug'],
            'image'=>$image ?? '',
            'depth' =>$depth,
            'path' =>$this->getPath($store['parentId']),
        ]);
//        alert()->success('successfully.');
        return redirect()->route('categories.view',$store['parent_id']);
    }

    /**
     * Display the specified resource.
     * @param Category $category
     * @return View
     */
    public function show(Category $category):View
    {
        //
    }

    /**
     * it shows the edit form.
     *
     * @param $categories
     * @return View
     */
    public function edit($categories):View
    {
        $category = Category::find($categories);
        return view('Categories::en.edit',compact('category'));
    }

    /**
     * it saves changed category.
     *
     * @param Update $update
     * @param $id
     * @return RedirectResponse
     */
    public function update(Update $update, $id):RedirectResponse
    {
        $category = Category::find($id);
        $image = $category->image;
        if ($update->hasFile('image')) {
            $image = $this->uploadFile($update->file('image'),
                'public/upload/category/image');
        }
        $category->update([
            'description'=>$update['description'],
            'title' => $update['title'],
            'slug' => $update['slug'],
           'image'=>$image,
        ]);
        return redirect()->route('categories.view',$category['parent_id']);
    }

    /**
     * it delete category.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category):RedirectResponse
    {

    }

    /**
     * it delete image category.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteFile(Request $request): JsonResponse
    {
        $category = Category::find($request->id);
        unlink($category->image);
        $category->update(['image'=> null,]);
        return response()->json(['success'=>true]);
    }

    public function getPath($parentId): ?string
    {
        if ($parentId ==0)
            $parent_path = null;
        else{
            $parentPath = Category::find($parentId)->path;
            $parent_path = is_null($parentPath)? $parentId : $parentPath . ',' .  $parentId;
        }
        return $parent_path;
    }
}

