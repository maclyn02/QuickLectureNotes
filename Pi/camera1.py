from picamera import PiCamera
from time import sleep

camera=PiCamera()

camera.rotation = 180
camera.resolution = (2592, 1944)
camera.start_preview()
sleep(10)
camera.capture('/home/pi/Desktop/img.jpg')
camera.stop_preview()
