#!/bin/bash

for i in 0 1 2 3 4 5 6 7;
do gpio mode $i out;
gpio write $i 0;
done;

