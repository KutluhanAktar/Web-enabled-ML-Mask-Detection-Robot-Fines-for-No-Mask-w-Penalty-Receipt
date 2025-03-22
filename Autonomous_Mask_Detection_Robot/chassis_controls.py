import argparse
import RPi.GPIO as GPIO
from time import sleep

# Define L298N pins.
in_1_1 = 20
in_1_2 = 21
en_1 = 6
in_2_1 = 19
in_2_2 = 26
en_2 = 13

# GPIO Settings
GPIO.setmode(GPIO.BCM)

GPIO.setup(in_1_1, GPIO.OUT)
GPIO.setup(in_1_2, GPIO.OUT)
GPIO.setup(en_1, GPIO.OUT)
GPIO.setup(in_2_1, GPIO.OUT)
GPIO.setup(in_2_2, GPIO.OUT)
GPIO.setup(en_2, GPIO.OUT)

GPIO.output(in_1_1, GPIO.LOW)
GPIO.output(in_1_2, GPIO.LOW)
GPIO.output(in_2_1, GPIO.LOW)
GPIO.output(in_2_2, GPIO.LOW)

s_1 = GPIO.PWM(en_1, 100)
s_1.start(50)
s_2 = GPIO.PWM(en_2, 100)
s_2.start(50)


# If the file is not imported:
if __name__ == '__main__': 
   parser = argparse.ArgumentParser()
   parser.add_argument("--direction", required=True, help="define the direction of the robot chassis")
   parser.add_argument("--speed", help="define the speed of the robot chassis")
   args = parser.parse_args()
   # Mandatory Direction Controls:
   if(args.direction == "forward"):
       GPIO.output(in_1_1, GPIO.LOW)
       GPIO.output(in_1_2, GPIO.HIGH)
       GPIO.output(in_2_1, GPIO.HIGH)
       GPIO.output(in_2_2, GPIO.LOW)
       print("Robot => Going Forward!")
       sleep(1)
   elif(args.direction == "left"):
       GPIO.output(in_1_1, GPIO.LOW)
       GPIO.output(in_1_2, GPIO.HIGH)
       GPIO.output(in_2_1, GPIO.LOW)
       GPIO.output(in_2_2, GPIO.LOW)       
       print("Robot => Going Left!")
       sleep(1)
   elif(args.direction == "right"):
       GPIO.output(in_1_1, GPIO.LOW)
       GPIO.output(in_1_2, GPIO.LOW)
       GPIO.output(in_2_1, GPIO.HIGH)
       GPIO.output(in_2_2, GPIO.LOW)
       print("Robot => Going Right!")
       sleep(1)
   elif(args.direction == "backward"):
       GPIO.output(in_1_1, GPIO.HIGH)
       GPIO.output(in_1_2, GPIO.LOW)
       GPIO.output(in_2_1, GPIO.LOW)
       GPIO.output(in_2_2, GPIO.HIGH)
       print("Robot => Going Backward!")
       sleep(1)
   else:
       print("Direction Value => Error!")
   # Optional Speed Controls:
   if args.speed:
       if(args.speed == "low"):
           s_1.ChangeDutyCycle(50)
           s_2.ChangeDutyCycle(50)
           print("Robot => Low Speed!")
           sleep(1)
       elif(args.speed == "moderate"):
           s_1.ChangeDutyCycle(75)
           s_2.ChangeDutyCycle(75)                
           print("Robot => Moderate Speed!")
           sleep(1)
       elif(args.speed == "high"):
           s_1.ChangeDutyCycle(90)
           s_2.ChangeDutyCycle(90)          
           print("Robot => High Speed!")
           sleep(1)
       else:
           print("Speed Value => Error!")
           
   print("Waiting New Command!")

# Exit and Clear
GPIO.cleanup()