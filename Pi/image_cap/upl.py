import ftplib
import requests

server = '192.168.137.1'
username = 'Maclyn'
password = ' '
ftp_connection = ftplib.FTP(server, username, password)
remote_path = ""
ftp_connection.cwd(remote_path)

fh = open('/home/pi/image_cap/cameratry/9.jpg', 'rb')
ftp_connection.storbinary('STOR 9.jpg', fh)
fh.close()

#r=requests.get('http://192.168.137.1/try/accept_image.php')
#print (r.status_code)

