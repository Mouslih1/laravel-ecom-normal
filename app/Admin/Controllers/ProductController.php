<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('old_price', __('Old price'));
        $grid->column('in_stock', __('In stock'));
        $grid->column('image', __('Image'));
        $grid->column('category_id', __('Category id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('old_price', __('Old price'));
        $show->field('in_stock', __('In stock'));
        $show->field('image', __('Image'));
        $show->field('category_id', __('Category id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('title', __('Title'));
        $form->text('slug', __('Slug'));
        $form->text('description', __('Description'));
        $form->decimal('price', __('Price'))->default(0.00);
        $form->decimal('old_price', __('Old price'))->default(0.00);
        $form->number('in_stock', __('In stock'));
        $form->file('image', __('Image'));
        $form->number('category_id', __('Category id'));
        /*$form->select('category_id', __('Categories'))->options(function ($id) {
            $category = Category::find($id);
        
            if ($category && $category->id) {
                return [$category->id => $category->title];
            }
        })->ajax('/admin/api/users');*/

        return $form;
    }
}
