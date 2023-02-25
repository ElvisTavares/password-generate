<?php

namespace App\Traits;

trait HasWords
{
    public function __construct(
      
    )
    {
        //
    }

    public function random(): string
    {
        $characters = 'abcdefghijklmnopqrstuvxz';
        $word = substr(str_shuffle($characters),0,8);

        return $word;
        
    }

    public function secure(): string
    {
        $word = $this->random();

        $asArray = str_split($word);

        $secureArray = array_map(
            callback: fn (string $item): string => $this->convertToNumerical($item),
            array: $asArray,
        );

        return implode('', $secureArray);
    }

    public function convertToNumerical(string $item): string
    {
        return match ($item) {
            'a' => '4',
            'e' => '4',
            'i' => '4',
            'o' => '4',
            default => $item,
        };
    }
}