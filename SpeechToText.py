#!/usr/bin/env python3
# Requires PyAudio and PySpeech.
 
import speech_recognition as sr
import sys
 
# Record Audio
r = sr.Recognizer()
#with sr.Microphone() as source:
    #print("Say something!")
with sr.AudioFile(sys.argv[1]) as source:
    audio = r.listen(source)
 
# Speech recognition using Google Speech Recognition
try:
	rt = open('D:\\Project\\'+sys.argv[2]+'.txt',"a")
	str=r.recognize_google(audio)
	rt.write(str)
	rt.close()
except sr.UnknownValueError:
    print("Google Speech Recognition could not understand audio")
except sr.RequestError as e:
    print("Could not request results from Google Speech Recognition service; {0}".format(e))
