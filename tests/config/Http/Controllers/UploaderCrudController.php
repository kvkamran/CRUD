<?php

namespace Backpack\CRUD\Tests\config\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\Tests\config\Models\Uploader;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UploaderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
       
        CRUD::setModel(Uploader::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/uploader');
        CRUD::setEntityNameStrings('uploader', 'uploaders');
    }

    protected function setupCreateOperation()
    {
        //CRUD::setValidation(UploaderRequest::class);

        CRUD::field('upload')->type('upload')->withFiles(['disk' => 'uploaders']);
        CRUD::field('upload_multiple')->type('upload_multiple')->withFiles(['disk' => 'uploaders']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
