<?php

Breadcrumbs::register('admin.diamondfeeds.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.diamondfeeds.management'), route('admin.diamondfeeds.index'));
});

Breadcrumbs::register('admin.diamondfeeds.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.diamondfeeds.index');
    $breadcrumbs->push(trans('menus.backend.diamondfeeds.create'), route('admin.diamondfeeds.create'));
});

Breadcrumbs::register('admin.diamondfeeds.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.diamondfeeds.index');
    $breadcrumbs->push(trans('menus.backend.diamondfeeds.edit'), route('admin.diamondfeeds.edit', $id));
});
