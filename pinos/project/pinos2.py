#!/usr/bin/python3

#import wiringpi2 as wiring
import os
import time
from i2clibraries import i2c_lcd_smbus

#iring.wiringPiSetup()

lcd = i2c_lcd_smbus.i2c_lcd(0x27,1, 2, 1, 0, 4, 5, 6, 7, 3)

lcd.command(lcd.CMD_Display_Control | lcd.OPT_Enable_Display)
lcd.backLightOn()

#wiring.pinMode(0, 1)
#wiring.digitalWrite(0,1)


lcd.clear()
lcd.setPosition(1, 0)
lcd.writeString("  Pinos:        ")

#oldsts = 0

#while 1:
#sts0 = wiring.digitalRead(0)
#if oldsts != sts0:  
lcd.setPosition(2, 0)
lcd.writeString("Status = ")# + str(sts0))
#  oldsts = sts0
 # time.sleep(0.5)

