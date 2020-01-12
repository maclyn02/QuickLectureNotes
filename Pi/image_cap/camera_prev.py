from time import sleep
from picamera import PiCamera
import time
from datetime import datetime
import sys

camera=PiCamera()

camera.start_preview(fullscreen=False, window=(200,200,600,600))
camera.rotation = 180
camera.resolution = (2592, 1944)

ii = datetime.now().strftime('%m_%d_%Y_%H_%M_%S')
camera.capture('/home/pi/image_cap/cameratry/'+ii+'.jpg')
camera.stop_preview()

