## SetUp Steps:
Step 0: Add Domain Name in host file, located in C:\Windows\System32\drivers\etc\hosts<br />
Step 1: Create a new folder in xampp\apache\conf\ <br />
Step 2: Copy Default files (this file, cert.conf, and make-cert.bat) in the new created folder <br />
Step 3: Go to SSL Creation Steps; <br />

## SSL Creation Steps
Step 1: Create a new folder with name of your domain in the new created folder <br />
Step 2: Copy the cert.conf file in the new created folder <br />
Step 3: Edit cert.conf file name replace {{domain}} with your domain <br />
Step 3: Run make-cert.bat file; <br />
Step 4: Install the certificate (server.crt) in 'Trusted Root Certification Authorities'. (Select “Place all certificate in the following store” and click browse and select Trusted Root Certification Authorities.) <br />

Step 5: Update the httpd-vhosts.conf file <br />
Step 6: Restart Apache Service <br />
Step 7: Restart Browser <br />
Step 8: Done. <br />
