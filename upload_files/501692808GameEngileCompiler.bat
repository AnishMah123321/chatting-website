@echo off
color 0b
:compile
cls
echo Compiling Game Engine
echo DATE AND TIME
echo %TIME%

rem set FILE=a.txt b.txt
SET MYPATH=%cd%

set INCLUDEPATH=-IThirsPartyLibs/ -Iinput/ -I../ThirsPartyLibs/ -I../input/ 

setlocal EnableDelayedExpansion

set /a len=23 
set FILE[0]~Name=Engine.hpp
set FILE[0]~Path=include\
set FILE[1]~Name=GameEngine.hpp
set FILE[1]~Path=include\
set FILE[2]~Name=animation.hpp
set FILE[2]~Path=include\renderer
set FILE[3]~Name=camera.hpp
set FILE[3]~Path=include\renderer
set FILE[4]~Name=imageloader.h
set FILE[4]~Path=include\renderer
set FILE[5]~Name=light.hpp
set FILE[5]~Path=include\renderer
set FILE[6]~Name=LoadShader.hpp
set FILE[6]~Path=include\renderer
set FILE[7]~Name=modelLoader.hpp
set FILE[7]~Path=include\renderer
set FILE[8]~Name=texture.hpp
set FILE[8]~Path=include\renderer
set FILE[9]~Name=pf.hpp
set FILE[9]~Path=include\platform
set FILE[10]~Name=PfWindow.hpp
set FILE[10]~Path=include\platform
set FILE[11]~Name=input.hpp
set FILE[11]~Path=include\input
set FILE[12]~Name=eventHandler.hpp
set FILE[12]~Path=include\input
set FILE[13]~Name=eventCategories.hpp
set FILE[13]~Path=include\input
set FILE[14]~Name=mouse.hpp
set FILE[14]~Path=include\input\mouse
set FILE[15]~Name=keyboard.hpp
set FILE[15]~Path=include\input\keyboard
set FILE[16]~Name=CSVParser.hpp
set FILE[16]~Path=include\extra
set FILE[17]~Name=mapparse.hpp
set FILE[17]~Path=include\extra
set FILE[18]~Name=math.hpp
set FILE[18]~Path=include\extra
set FILE[19]~Name=referenceCounter.hpp
set FILE[19]~Path=include\extra
set FILE[20]~Name=entity.hpp
set FILE[20]~Path=include\core
set FILE[21]~Name=entityRenderer.hpp
set FILE[21]~Path=include\core
set FILE[22]~Name=modelHandler.hpp
set FILE[22]~Path=include\core


rem set FILEPATH=include/core
rem set FILE=include\Engine.hpp
rem set FILEPATH=%FILEPATH%;include/core
rem set FILE=%FILE%;include\GameEngine.hpp

set /a i=0
:loop
	cd %MYPATH%
    if "%i%" equ "%len%" goto :END 
    set cur.Name=
    set cur.Path=

    for /f "usebackq delims==~ tokens=1-3" %%j in (`set FILE[%i%]`) do ( 
       set cur.%%k=%%l 
    ) 
    echo:
    echo Working for file with
    echo Name=%cur.Name%
    echo Path=%cur.Path%
    set /a i=%i%+1 
    echo:
	SET gch=%cur.Name%.gch
	set gch=%gch: =%
	
	cd %cur.Path%
	IF EXIST !gch!. (
		set returnval=0
		call :checkheaderforcompile %cur.Name%,!gch!,%returnval%
		if %returnval%==1 call :compileheaders %%a 
		echo Noneed to compile
	) ELSE (
	    call :compileheaders %cur.Name%
	)
	echo:
	echo:
	echo:
	echo:
goto loop
goto :END
set /a count=0
for %%a in (%FILE%) do ( 
	echo:
	set /a count+=1
	echo %%FILEPATH[!count!]%%
	if defined FILEPATH[%count%] ( 
		call echo %%Arr[%x%]%% 
	) else (
		EXIT /B 0 
	)
	echo For file name %%a 
	set pathtofile=
	set gch=%%a.gch
	echo !gch!
	IF EXIST !gch!. (
		set returnval=0
		call :checkheaderforcompile %%a,!gch!,%returnval%
		if %returnval%==0 (echo No need to compile)
	) ELSE (
	    call :compileheaders %%a
	)
	echo:
)
goto END

rem FUNCTIONS
:checkheaderforcompile
	FOR %%i IN (%1) DO SET DATE1=%%~ti
	FOR %%i IN (%2) DO SET DATE2=%%~ti

	IF "%DATE1%"=="%DATE2%" ECHO Files have same age && EXIT /B 0

	FOR /F %%i IN ('DIR /B /O:D %1 %2') DO SET NEWEST=%%i
	echo %NEWEST% is new
	set %3=0
	IF "%NEWEST%" equ "%1" (
		echo The precompiled file is old.
		set %3=1
		call :compileheaders %1
	)
EXIT /B 0

:compileheaders
echo compiling header %1
set command=g++ %1 %INCLUDEPATH%
echo %command%
call %command%
if %ERRORLEVEL% NEQ 0 exit /B 1
EXIT /B 0



:END
pause...

rem	SET FILE1=a.txt
rem	SET FILE2=b.txt
rem
rem	FOR %%i IN (%FILE1%) DO SET DATE1=%%~ti
rem	FOR %%i IN (%FILE2%) DO SET DATE2=%%~ti
rem	IF "%DATE1%"=="%DATE2%" ECHO Files have same age && GOTO END
rem
rem	FOR /F %%i IN ('DIR /B /O:D %FILE1% %FILE2%') DO SET NEWEST=%%i
rem	ECHO Newer file is %NEWEST%