<?php


namespace App\Scopes;


use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ScopePublishedAdds implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if(!Auth::user()->hasRole(Role::getAdminRole())) {

            return $builder->where('is_published', 1);
        }
    }
}
