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

Website document root & Maintenance page
----------------------------------------
The 'live' and 'staging' symlinks will point to the project root, this will not
be the actual document root. Usually the document root resides in */web*

The maintenance page should be a self-contained HTML page which displays a 
friendly message to users when the site is being updated. Any references to CSS
or image files should exist within the maintenance folder. 

When Phing deploys the live site the live document root is switched to the 
maintenance page temporarily. 

If the document root is */web* then your maintenance page should reside in 
*/maintenance/web*

Keeping the same document root sub-folders in maintenance will help ensure the 
maintenance page works. If you have a different document root, you will need to 
ensure you have corresponding sub-folders in the maintenance folder to mirror 
the main website document root. 

For example, on a CMS v2 project the document root may be:

    sites/cambridgebs.co.uk/public

Therefore, the maintenance document root is:

    maintenance/sites/cambridgebs.co.uk/public

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

Phing documentation
-------------------
For further information see [http://www.phing.info/docs/guide/stable/](http://www.phing.info/docs/guide/stable/)