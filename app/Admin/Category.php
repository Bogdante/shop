<?php

use App\Modules\Catalog\Models\Category;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Category::class, function (ModelConfiguration $model) {
    $model->setTitle('Категории');

    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id', 'ID')->setWidth('50px'),
                AdminColumn::text('name', 'Название'),
                AdminColumn::text('slug', 'Слаг'),
                AdminColumn::datetime('created_at', 'Создано')->setFormat('d.m.Y H:i'),
            ])
            ->paginate(6);
    });

    $model->onCreateAndEdit(function (){

        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название')->required(),
            AdminFormElement::text('slug', 'Слаг')
        ]);
    });

})
    ->addMenuPage(Category::class, 0)
    ->setIcon('fa fa-solid fa-folder-open');
