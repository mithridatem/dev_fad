<?php
    class Exemple{
        public const EXEMPLE = 1;
        public const EXEMPLE2 = 2;
        public const EXEMPLE3 = 3;
        public const EXEMPLE4 = 4;
        public const EXEMPLE5 = 5;
        public $attribut = "toto";
        
        public static function test(){
            echo "ma fonction";
        }
        public function exemple(){
            echo 'exemple';
        }
    }
    $test = new Exemple();
    echo $test::EXEMPLE2;
    $test->exemple();
    $test::test();
    $test->attribut;


