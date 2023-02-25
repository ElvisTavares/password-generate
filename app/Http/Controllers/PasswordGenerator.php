<?php

namespace App\Http\Controllers;

use App\Traits\HasWords;

class PasswordGenerator extends Controller
{
    use HasWords;
    public function __construct(
       
    )
    {
        //
    }

    public function generate(): string
    {
        return $this->build(
            $this->random(),
            $this->random(),
        );
      
    }

    public function generateSecure(): string
    {
      return $this->build(
        $this->secure(),
        $this->secure(),
      );
    }

    private function build(string ...$parts)
    {
        return implode ('-', $parts);
    }
 
}
