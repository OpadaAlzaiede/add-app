<?php

function isAdmin() {

    return \Illuminate\Support\Facades\Auth::user()->hasRole(\App\Models\Role::getAdminRole());
}

function isAddOwner($add) {

    return $add->user_id === \Illuminate\Support\Facades\Auth::id();
}
