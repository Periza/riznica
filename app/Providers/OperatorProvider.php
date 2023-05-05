<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class OperatorProvider extends EloquentUserProvider
{
    public function validateCredentials(Authenticatable $operator, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $operator->getAuthPassword());
    }

    protected function getAuthIdentifierName()
    {
        return 'sifra';
    }
}