<?php

Breadcrumbs::register('admin.diamonds.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.diamonds.management'), route('admin.diamonds.index'));
});

Breadcrumbs::register('admin.diamonds.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.diamonds.index');
    $breadcrumbs->push(trans('menus.backend.diamonds.create'), route('admin.diamonds.create'));
});

Breadcrumbs::register('admin.diamonds.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.diamonds.index');
    $breadcrumbs->push(trans('menus.backend.diamonds.edit'), route('admin.diamonds.edit', $id));
});
