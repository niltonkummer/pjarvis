#!/usr/bin/python

import wiringpi2 as wiring
import time

wiring.wiringPiSetup()
wiring.pinMode(0, 1)
wiring.digitalWrite(0,1)
time.sleep(2)


oldsts = 0
while (1):
 sts0 = wiring.digitalRead(0)
 if oldsts <> sts0:  
   print sts0
   oldsts = sts0
# time.sleep(2)
  