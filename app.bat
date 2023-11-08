@echo off
set ngrok_command=ngrok http --domain=pig-tidy-gradually.ngrok-free.app 80
echo Running ngrok...
%ngrok_command%
pause
