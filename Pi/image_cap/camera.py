import ftplib
import requests
from time import sleep
from picamera import PiCamera
import time
from datetime import datetime
import sys

#Capture the image
camera=PiCamera()
camera.start_preview(fullscreen=False, window=(200,200,600,600))
camera.rotation = 180
camera.resolution = (2592, 1944)
#Name the image
ii = datetime.now().strftime('%d_%m_%Y_%H_%M')
camera.capture('/home/pi/image_cap/cameratry/'+ii+'_'+sys.argv[2]+'_'+sys.argv[3]+'.jpg')
camera.stop_preview()

#Upload
server = '192.168.137.1'
username = 'Maclyn'
password = ' '
ftp_connection = ftplib.FTP(server, username, password)
remote_path = ""
ftp_connection.cwd(remote_path)
fh = open('/home/pi/image_cap/cameratry/'+ii+'_'+sys.argv[2]+'_'+sys.argv[3]+'.jpg', 'rb')

#File path for handwriting
if(sys.argv[1]=="h"):    
    ftp_connection.storbinary('STOR '+ii+'_'+sys.argv[2]+'_'+sys.argv[3]+'.jpg', fh)
else:
    ftp_connection.storbinary('STOR /Diagrams/'+ii+'_'+sys.argv[2]+'_'+sys.argv[3]+'.jpg', fh)
    
fh.close()
r=requests.get('http://192.168.137.1/try/accept_image.php')

