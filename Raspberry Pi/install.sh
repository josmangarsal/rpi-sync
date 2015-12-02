#!/bin/bash

# Use your VALUES
update="python /opt/updateIP.py --url http://www.mypiweb.com --file updateIP.php --user USER --password PASS"

# Copy the script to /opt/
sudo cp updateIP.py /opt/
sudo chmod +x /opt/updateIP.py

# Get crontab
crontab -l > mycron

# Update cron (sync every 2 hours)
echo "0 */2 * * * $update" >> mycron

# Write cron
crontab mycron

# Remove temps
rm mycron

# Run on startup
sudo cp updateIP /etc/init.d/updateIP
sudo chmod 755 updateIP
sudo update-rc.d updateIP defaults 99
