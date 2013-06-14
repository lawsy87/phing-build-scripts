Phing deployment scripts
========================

*Please note this is in progress*

Installation
------------

1) Install phing with the following dependencies:

    pear channel-discover pear.phing.info
    pear install --alldeps phing/phing
    pear install -a Mail
    pear install -a Mail_Mime 
    pear install VersionControl_Git-alpha
    
If you need to upgrade PEAR to the latest version use:

    pear install --force PEAR-1.9.4

2) Copy build.xml and the Tasks folder to the client root folder 

3) Review the following build.xml propertiesand update these to reflect your
   project.

* repo - Git repo to clone when making deployments
* email - Email address to send live deployment summaries to

4) Add any empty folders that need to be created in the *create-folders* target.
   You can also set any special permissions, for example making folders writeable
   by Apache.

5) Add any symlinks to shared folders in the section which is commented with 
   *Add any symlinks to shared folders here*.

6) See README.md for usage instructions