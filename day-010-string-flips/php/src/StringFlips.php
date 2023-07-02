<?php

namespace src;

class StringFlips
{
    private string $string = '';

    private string $flip_method = '';

    /**
     * Valid flip methods
     *
     * @var array <method>:<class>
     */
    private array $valid_flip_methods = ['word' => '\src\FlipMethods\Word', 'sentence' => '\src\FlipMethods\Sentence'];

    public function setString(string $string): object
    {
        if(strlen($string) < 1){
            throw new \LengthException(
                'The string can\'t be empty'
            );
        }

        $this->string = trim($string);

        return $this;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function setFlipMethod(string $flip_method): object
    {
        if(!array_key_exists($flip_method, $this->getValidFlipMethods())){
            throw new \InvalidArgumentException(sprintf(
                '%s is not a valid flip method. Please call getValidFlipMethods(), to see a list of valid flip methods.',
                $flip_method
            ));
        }

        $this->flip_method = $flip_method;

        return $this;
    }

    public function getFlipMethod(): string
    {
        return $this->flip_method;
    }

    public function getValidFlipMethods(): array
    {
        return $this->valid_flip_methods;
    }

    public function flip(): string
    {
        $string = $this->getString();
        $method = $this->getFlipMethod();

        if(strlen($string) < 1){
            throw new \LengthException(
                'You need first set the string to be flipped. Please call setString().'
            );
        }

        if(strlen($method) < 1){
            throw new \LengthException(
                'You need first set the method to flip a string. Please call setFlipMethod().'
            );
        }

        $method_class = $this->valid_flip_methods[$method];

        $flipped = $method_class::flip($string);

        return $flipped;
    }
}