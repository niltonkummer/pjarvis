#!/usr/bin/python3

import time
import sys
import wiringpi2 as wiring
import smbus
from i2clibraries import i2c_lcd_smbus
from subprocess import *

lcd = i2c_lcd_smbus.i2c_lcd(0x27,1, 2, 1, 0, 4, 5, 6, 7, 3)
lcd.command(lcd.CMD_Display_Control | lcd.OPT_Enable_Display)# esconde cursor
lcd.clear()
lcd.backLightOn()

pin =     [0,1,2,3,4,5,6,7]
sts =     [0,1,2,3,4,5,6,7]
oldsts =  [0,1,2,3,4,5,6,7]
colunas = [6,6,2,2,15,15,11,11]
linhas =  [1,2,3,4,1,2,3,4]

wiring.wiringPiSetup()

for i in range(8):
    wiring.pinMode(pin[i], 0)
    sts[i] = 0
    oldsts[i] = 0

lcd.setPosition(1, 0)
lcd.writeString("Pin1= 0  Pin5= 0")
lcd.setPosition(2, 0)
lcd.writeString("Pin2= 0  Pin6= 0")
lcd.setPosition(3, -4)
lcd.writeString("Pin3= 0  Pin7= 0")
lcd.setPosition(4, -4)
lcd.writeString("Pin4= 0  Pin8= 0")


while sts[6]!= 1:
  for i in range(8):
       sts[i] = wiring.digitalRead(i)
       if oldsts[i] != sts[i]:
         lcd.setPosition(linhas[i],colunas[i])
         lcd.writeString(str(sts[i]))
         oldsts[i] = sts[i]
lcd.clear()         
         




