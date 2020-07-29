<?php

Breadcrumbs::register('admin.diamondtemplates.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.diamondtemplates.management'), route('admin.diamondtemplates.index'));
});

Breadcrumbs::register('admin.diamondtemplates.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.diamondtemplates.index');
    $breadcrumbs->push(trans('menus.backend.diamondtemplates.create'), route('admin.diamondtemplates.create'));
});

Breadcrumbs::register('admin.diamondtemplates.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.diamondtemplates.index');
    $breadcrumbs->push(trans('menus.backend.diamondtemplates.edit'), route('admin.diamondtemplates.edit', $id));
});
