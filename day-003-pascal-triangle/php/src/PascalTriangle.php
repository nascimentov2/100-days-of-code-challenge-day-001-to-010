<?php

namespace src;

class PascalTriangle
{
    private array $triangle;

    private int $levels;

    public function setTriangleLevels(int $levels): void
    {
        $this->levels = $levels;
    }

    public function getTriangleLevels(): int
    {
        return $this->levels;
    }

    public function make(): array
    {
        $last_level = [];

        for ($i=1; $i<=$this->levels; $i++){
            
            $this->triangle[$i] = $this->buildLevel($last_level);

            $last_level = $this->triangle[$i];
        }
        
        return $this->triangle;
    }

    private function buildLevel(array $last_level): array
    {
        //first and second level
        if(count($last_level) < 2){
            return (count($last_level) === 0) ? [1] : [1,1] ;
        }

        //other levels
        $new_level = [];

        //first_node always zero
        $first_node = 0;

        //triangle increase size by 1 every level
        $last_node = count($last_level);
        
        //first node value always 1
        $new_level[$first_node] = 1;

        //last node value always 1
        $new_level[$last_node] = 1;

        $item = 0;
        $last_item = $new_level[$first_node];
        
        foreach($last_level as $value){

            //first and last node no changes to node level
            if($item === $first_node || $item === $last_node){
                $item++; continue;
            }

            //last but one item
            if($item === ($last_node-1)){
                $new_level[$item] = ($new_level[$last_node] + $last_item);
                $item++; continue;
            }
            
            $new_level[$item] = ($last_item + $value);

            $last_item = $value;

            $item++;
        }

        ksort($new_level); return $new_level;
    }
}