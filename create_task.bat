@echo off
set "TASK_NAME=AutoGitPush"
set "BATCH_FILE=C:\zawajnet_final\push.bat"
set "INTERVAL=HOURLY"

:: حذف المهمة إن كانت موجودة
schtasks /Delete /F /TN "%TASK_NAME%"

:: إنشاء المهمة المجدولة
schtasks /Create ^
 /SC HOURLY ^
 /TN "%TASK_NAME%" ^
 /TR "\"%BATCH_FILE%\"" ^
 /ST 08:00 ^
 /RL HIGHEST ^
 /F

echo [✔] تم إنشاء المهمة المجدولة بنجاح لتشغيل: %BATCH_FILE% كل ساعة
pause
