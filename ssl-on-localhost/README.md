## SetUp Steps:
Step 0: Add Domain Name in host file, located in C:\Windows\System32\drivers\etc\hosts
Step 1: Create a new folder in xampp\apache\conf\
Step 2: Copy Default files (this file, cert.conf, default-cert.conf, and make-cert.bat) in the new created folder
Step 3: Go to SSL Creation Steps;

## SSL Creation Steps
Step 1: Create a new folder with name of your domain in the new created folder
Step 2: Copy the cert.conf file in the new created folder
Step 3: Edit cert.conf file name replace {{domain}} with your domain
Step 3: Run make-cert.bat file;
Step 4: Install the certificate (server.crt) in 'Trusted Root Certification Authorities'. (Select “Place all certificate in the following store” and click browse and select Trusted Root Certification Authorities.)

Step 5: Update the httpd-vhosts.conf file
Step 6: Restart Apache Service
Step 7: Restart Browser
Step 8: Done.