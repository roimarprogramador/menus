<?php

namespace LaravelEnso\Menus\app\Forms\Builders;

use LaravelEnso\Menus\app\Models\Menu;
use LaravelEnso\Forms\app\Services\Form;
use LaravelEnso\Permissions\app\Models\Permission;

class MenuForm
{
    private const FormPath = __DIR__.'/../Templates/menu.json';

    private $form;

    public function __construct()
    {
        $this->form = (new Form(self::FormPath))
            ->options('parent_id', Menu::isParent()->get(['id', 'name']))
            ->options('permission_id', Permission::get(['id', 'name']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Menu $menu)
    {
        return $this->form
            ->edit($menu);
    }
}
