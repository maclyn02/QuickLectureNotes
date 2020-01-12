@echo off

D:

cd Project

set CLASSPATH=.

javac *.java

 setlocal enableextensions
for %%x in (D:\Project\uploaded_img\*) do ( 
python watershed.py %%x
)
endlocal

setlocal enableextensions
for %%x in (D:\Project\LineSeg_img\*) do (
java Lseg %%x 
)
endlocal

setlocal enableextensions
for %%x in (D:\Project\WordSeg_img\*) do (
java Wseg %%x
)
endlocal

cd segmented_images

setlocal enableextensions
for %%x in (D:\\Project\\segmented_images\\*.jpg) do ( 
	setlocal enableextensions
	for %%y in (D:\\Project\\*.txt) do (  
	python TrainAndTest.py %%x %%y
	)
	endlocal 
)
endlocal

cd..

setlocal enableextensions
for %%x in (D:\\Project\\*.txt) do ( 
java SpaceRemove %%x
)
endlocal

exit