@echo off

D:
cd Project

 setlocal enableextensions
for %%x in (D:\Project\Audio\*.mp3) do ( 
python SpeechToText.py %%x

)
endlocal
move %%x C:\wamp\www\quickNotes\audio

exit