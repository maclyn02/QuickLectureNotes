import numpy as np
import cv2
import sys
from matplotlib import pyplot as plt

a=sys.argv[1]

img = cv2.imread(a)

gray = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)


ret, thresh = cv2.threshold(gray,0,255,cv2.THRESH_BINARY+cv2.THRESH_OTSU)

# noise removal
kernel = np.ones((1,1),np.uint8)
opening = cv2.morphologyEx(thresh,cv2.MORPH_OPEN,kernel, iterations = 4)

'''
kernel = np.ones((4,4),np.uint8)
erosion = cv2.erode(opening,kernel,iterations = 1)
ret, er = cv2.threshold(erosion,0,255,cv2.THRESH_BINARY_INV+cv2.THRESH_OTSU)
'''
a=a[::-1]
c1='.'
c2='\\'
b=a[a.find(c1)+1:a.find(c2)]
b=b[::-1]
cv2.imwrite('D:\Project\\LineSeg_img\\'+b+'.jpg',opening)
rt = open('D:\\Project\\'+b+'.txt',"a")
rt.close()

