<?php
namespace App\Traits;

trait HasRandomOIB
{
    public function randomOIB()
    {
        $digits = '';
        for ($i = 0; $i < 11; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
}

?>