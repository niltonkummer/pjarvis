#!/bin/bash

#seta os pinos como saida

for i in 0 1 2 3 4 5 6 7;
do gpio mode $i out;
done;

#seta os pinos para "zero"

for i in 0 1 2 3 4 5 6 7;
do gpio write $i 0;
done;