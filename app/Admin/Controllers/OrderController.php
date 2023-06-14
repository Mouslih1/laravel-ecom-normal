<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('product_name', __('Product name'));
        $grid->column('qty', __('Qty'));
        $grid->column('price', __('Price'));
        $grid->column('total', __('Total'));
        $grid->column('paid', __('Paid'));
        $grid->column('delivered', __('Delivered'));
        $grid->column('user_id', __('User id'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_name', __('Product name'));
        $show->field('qty', __('Qty'));
        $show->field('price', __('Price'));
        $show->field('total', __('Total'));
        $show->field('paid', __('Paid'));
        $show->field('delivered', __('Delivered'));
        $show->field('user_id', __('User id'));
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
        $form = new Form(new Order());

        $form->text('product_name', __('Product name'));
        $form->number('qty', __('Qty'));
        $form->decimal('price', __('Price'));
        $form->decimal('total', __('Total'));
        $form->switch('paid', __('Paid'));
        $form->switch('delivered', __('Delivered'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
