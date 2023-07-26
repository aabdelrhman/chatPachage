<?php
namespace Abdelrhman\Chat\Services;

use Illuminate\Database\Eloquent\Model;

class BaseClass{

    const PAGINATION = 10;

    public function findById(Model $model , $id){
        return $model->find($id);
    }

    public function sortType(){
        return 'DESC';
    }

}
