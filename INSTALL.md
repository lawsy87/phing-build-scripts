Phing deployment scripts
========================

Creating a custom build.xml script for your project
---------------------------------------------------

1) Copy the appropriate starter build.xml script to the *scripts/phing* folder
   on your project. See https://github.com/studio24/phing-build-scripts

2) Copy the Tasks folder to *scripts/phing/Tasks*

3) Review the following build.xml properties and update these to reflect your
   project.

* repo - Git repo to clone when making deployments
* email - Email address to send live deployment summaries to

4) Add any empty folders that need to be created in the *create-folders* target.
   You can also set any special permissions, for example making folders writeable
   by Apache.

5) Add any symlinks to shared folders in the section which is commented with 
   *Add any symlinks to shared folders here*.


Installation of build.xml on server
-----------------------------------

1) Install phing with the following dependencies:

    pear channel-discover pear.phing.info
    pear install --alldeps phing/phing
    pear install -a Mail
    pear install -a Mail_Mime 
    pear install VersionControl_Git-alpha
    
If you need to upgrade PEAR to the latest version use:

    pear install --force PEAR-1.9.4

2) Copy build.xml and the Tasks folder to the project root folder on the server.
   This is usually */var/www/client-name/domain.com* so the Phing script should
   be installed to:

    /var/www/client-name/domain.com/build.xml
    /var/www/client-name/domain.com/Tasks

3) See README.md for usage instructions