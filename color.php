<?php

class Color {

    private int $red = 0,
                $green = 0,
                $blue = 0,
                $error = 0;

    public function __construct($red, $green, $blue){

        $this->checkNumber($red) ? $this->setRed($red) : $this->error++;
        $this->checkNumber($green) ? $this->setGreen($green) : $this->error++;
        $this->checkNumber($blue) ? $this->setBlue($blue) : $this->error++;

        if($this->error > 0){
            throw new Exception("The data of colors must be between 1 and 255");
        }

    }

    public function mix(Color $color): Color
    {

        return new Color(
            round(($this->getRed() + $color->getRed()) / 2),
            round(($this->getGreen() + $color->getGreen()) / 2),
            round(($this->getBlue() + $color->getBlue()) / 2)
        );
        
    }

    private function checkNumber(int $value): bool
    {

        if($value > 0 && $value <= 255){
            return true;
        }

        return false;
    }

    public function equals(Color $color): bool
    {

        if($this->getRed() !== $color->getRed() || $this->getGreen() !== $color->getGreen() || $this->getBlue() !== $color->getBlue()){
            return false;
        }

        return true;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setRed(int $value){
        $this->red = $value;
    }

    private function setGreen(int $value){
        $this->green = $value;
    }

    private function setBlue(int $value){
        $this->blue = $value;
    }

}


$color = new Color(63, 94, 198);

$mixedColor = $color->mix(new Color(71, 98, 170));

echo $mixedColor->getRed() . "<br>"; 
echo $mixedColor->getGreen() . "<br>"; 
echo $mixedColor->getBlue() . "<br>";

echo "<div style='width:100px; height:100px; background: rgb({$mixedColor->getRed()} {$mixedColor->getGreen()} {$mixedColor->getBlue()})'></div>";

if (!$color->equals($mixedColor)) {
    echo 'Цвета не равны';
}


?>