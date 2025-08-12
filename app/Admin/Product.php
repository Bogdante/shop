<?php

use App\Modules\Catalog\Models\Product;
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Modules\Catalog\Models\Category;

AdminSection::registerModel(Product::class, function (ModelConfiguration $model) {
    $model->setTitle('Товары');

    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id', 'ID')->setWidth('50px'),
                AdminColumn::text('name', 'Название'),
                AdminColumn::text('category.name', 'Категория'),
                AdminColumn::text('slug', 'Слаг'),
                AdminColumn::text('price', 'Цена'),
                AdminColumn::image('picture_path', 'Картинка')->setWidth('100px'),
                AdminColumn::text('description', 'Описание')->setWidth('200px'),
                AdminColumn::datetime('created_at', 'Создано')->setFormat('d.m.Y H:i'),
            ])
            ->paginate(6);
    });

    $model->onCreateAndEdit(function () {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::select('category_id', 'Категория')
                ->setOptions(Category::all()->pluck('name', 'id')->toArray())
                ->setDisplay('name')->required(),
            AdminFormElement::text('slug', 'Слаг'),
            AdminFormElement::text('price', 'Цена')->required(),
            AdminFormElement::image('picture_path', 'Картинка')->required(),
            AdminFormElement::textarea('description', 'Описание'),
        ]);
    });
})
    ->addMenuPage(Product::class, 0)
    ->setIcon('fa fa-brands fa-product-hunt');
