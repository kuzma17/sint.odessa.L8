<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PageController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Страницы');
            $content->description('');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Страницы');
            $content->description('');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Страницы');
            $content->description('');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Page::class, function (Grid $grid) {

            $grid->column('id', 'ID')->sortable();
            $grid->column('title_ru', 'title');
            $grid->column('url', 'url');

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Page::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title_ru', 'Название ru')->rules('required');
            $form->text('title_ua', 'Название ua')->rules('required');
            $form->textarea('seo_keywords', 'Ключевые слова')->rules('required');;
            $form->ckeditor('content_ru', 'Текст страници ru')->rules('required');
            $form->ckeditor('content_ua', 'Текст страници ua')->rules('required');
            $form->text('url', 'url');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

}
