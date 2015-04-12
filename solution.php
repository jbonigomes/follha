<?php

class solution
{
  private $groups;
  private $alphabet;

  public function __construct($groups)
  {
    $this->groups = $groups;

    $this->alphabet = [
      'A' => 1,
      'B' => 2,
      'C' => 3,
      'D' => 4,
      'E' => 5,
      'F' => 6,
      'G' => 7,
      'H' => 8,
      'I' => 9,
      'J' => 10,
      'K' => 11,
      'L' => 12,
      'M' => 13,
      'N' => 14,
      'O' => 15,
      'P' => 16,
      'Q' => 17,
      'R' => 18,
      'S' => 19,
      'T' => 20,
      'U' => 21,
      'V' => 22,
      'W' => 23,
      'X' => 24,
      'Y' => 25,
      'Z' => 26
    ];
  }

  public function __toString()
  {
    return $this->buildResult();
  }

  private function buildResult()
  {
    $result = '';

    foreach($this->groups as $key => $group)
    {
      if($this->willTakeThisGroup($key, $group))
      {
        $result .= 'Comet ' . $key . ' will take group ' . $group;
      }
      else
      {
        $result .= 'Comet ' . $key . ' will NOT take group ' . $group;
      }

      $result .= "\n";
    }

    return $result;
  }

  private function willTakeThisGroup($key, $group)
  {
    return ($this->wordToInt($key) % 45) === ($this->wordToInt($group) % 45);
  }

  private function wordToInt($word)
  {
    $product = 1;
    $wordArr = str_split(strtoupper(trim($word)));

    foreach($wordArr as $char)
    {
      $product = $this->alphabet[$char] * $product;
    }

    return $product;
  }

}

$groups = [
  'HALLEY'  => 'AMARELO',
  'ENCKE'   => 'VERMELHO',
  'WOLF'    => 'PRETO',
  'KUSHIDA' => 'AZUL'
];

echo new solution($groups);
