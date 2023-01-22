<?php

/*
Santa is delivering presents to an infinite two-dimensional grid of houses.

He begins by delivering a present to the house at his starting location,
and then an elf at the North Pole calls him via radio and tells him where to move next.
Moves are always exactly one house to the north (^), south (v), east (>), or west (<).
After each move, he delivers another present to the house at his new location.

However, the elf back at the north pole has had a little too much eggnog,
and so his directions are a little off, and Santa ends up visiting some houses more than once.
How many houses receive at least one present?

For example:

> delivers presents to 2 houses: one at the starting location, and one to the east.
^>v< delivers presents to 4 houses in a square,
including twice to the house at his starting/ending location.
^v^v^v^v^v delivers a bunch of presents to some very lucky children at only 2 houses.
*/



$input = file_get_contents('Day3.txt'); // ucitaj mi sve iz datoteke kao string

//grid mreza dvodimenzionalna (Pocetna tocka)
$x = 0;
$y = 0;



$houses=[]; //houses mi je array 


for($i=0 ; $i < strlen($input) ; $i++){   

    if($input[$i] == '^'){ // kako je moguce da mi string vrti kao array odnosno da trazi po stringu
                            //ko da je array [$i]
        $x++;
    }elseif($input[$i] == 'v'){

        $x--;
    }elseif($input[$i] == '>'){

        $y++;
    }elseif($input[$i] == '<'){

        $y--;
    }

        //nakon sto si zavrsio sve ifove ubaci mi trenutni x i y u array s dvije varijable
        $location = array($x,$y); // location = [$x(0),$y(1)] x je 0 a y je 1

        $flag = false; // koristimo zastavu zbog ponasanja for each petlje da smo koristili for mogli bi bez ovako nam je 
                        // ona izlazak iz petlje kad  je nova kuca spremna za upis u lokaciju 
        foreach($houses as $house){

            if($house == $location){
                $flag = true;
                break;
            }
        } // kraj for each

        if($flag != true){
            $houses[] = $location; //ako kuca nije posjecena spremi tu lokaciju kao novu kucu u array
        }
    
}
echo count($houses);
