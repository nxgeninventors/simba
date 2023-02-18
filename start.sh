#!/bin/bash

# Change to the project directory
cd /Users/mayothi/Muni/Projects/blog/ngi/simba

# Open the project in Visual Studio Code
open -a "Visual Studio Code" .

# Wait for Visual Studio Code to open
sleep 5

# # Send a command to the integrated terminal to run php artisan serve
# osascript <<EOD
#     tell application "Visual Studio Code"
#         activate
#         tell application "System Events" to keystroke "Control +\`" using {command down}
#         delay 1

#         do script "php artisan serve" in front window
#         delay 1
#         do script "yarn dev" in (make new terminal)
#         tell application "System Events" to keystroke "php artisan serve"
#         delay 1
#         tell application "System Events" to keystroke "yarn dev"
#         delay 1
#         tell application "System Events" to keystroke return
#     end tell
# EOD

# Send a command to the integrated terminal to run php artisan serve
# osascript <<EOD
#     tell application "Visual Studio Code"
#         activate
#         tell application "System Events" to keystroke "Control +\`" using {command down}
#         delay 1
#         do script "php artisan serve" in front window
#         delay 1
#         do script "yarn dev" in (make new terminal)
#     end tell
# EOD

osascript <<EOD
    tell application "Terminal"
        activate
        do script "php artisan serve" in front window
        delay 1
        do script "yarn dev" in (make new tab)
    end tell
EOD


echo "completed"

# osascript <<EOD
# tell application "Visual Studio Code"
#     activate
#     tell application "System Events" to keystroke "Control+\`" using {command down}
# end tell
# EOD

# osascript


# osascript -e 'tell application "Visual Studio Code" to activate' -e 'tell application "System Events" to tell process "Code" to keystroke "Control + `" using command down'
