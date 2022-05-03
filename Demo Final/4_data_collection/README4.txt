This readme informs end users how to run the data aquisition script for to insert new 
temperature data into the Quality Data System. 

The script is python based and must run on a Linux (raspbian preferred) instance of a 
Raspberry Pi that is configured to use a DHT11 sensor module connected via GPIO pins. 
The script will read the data from the pins and insert it into the database for the system. 

The pins utilized depend on the model. This version has been constructed for use
with a Raspberry Pi 3. 

The script can either be ran on start up continously and use a sleep function to wait five 
minutes before the next read and write, or the Linux system can utilize a Cron Job to run 
the script every five minutes. Currently the script executes about once per minute. 

The username, password, and IP, hostname address are specific to the current configuration, 
and would need changed if the system housing the database were to change. 

It important to avoid IP conflicts by ensuring that static IPs are set and tracked and
that hostnames are set. Additionally, a raspberry pi instance must be created in the
database within the SensorInfo table. 