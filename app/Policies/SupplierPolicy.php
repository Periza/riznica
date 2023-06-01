<?php

namespace App\Policies;

use App\Models\Operator;
use App\Models\Supplier;
use Illuminate\Auth\Access\Response;

class SupplierPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Operator $operator): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Operator $operator, Supplier $supplier): bool
    {
        /** 
        * The operator can view the models if it's visible_to_all is set to true
        * or the supplier's partner_id is equal to operators's partner id
        */
        return $supplier->visible_to_all || $supplier->partner_id == $operator->partner_id;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Operator $operator): bool
    {
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Operator $operator, Supplier $supplier): bool
    {
        return $operator->partner_id == $supplier->partner_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Operator $operator, Supplier $supplier): bool
    {
        return $operator->partner_id == 1 || $operator->partner_id == $supplier->partner_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Operator $operator, Supplier $supplier): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Operator $operator, Supplier $supplier): bool
    {
        //
    }
}
