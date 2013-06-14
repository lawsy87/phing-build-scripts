Phing build scripts
-------------------

*Please note this is in progress*

Collection of common Phing build scripts for Studio 24 web projects

See INSTALL.md for installation instructions.

Usage
=====

Deploy to staging

    phing deploy-staging

Deploy a branch to staging (not available for live deployments)

    # Deploy feature/shiny-new-feature to staging
    phing deploy-staging -Dbranch feature/shiny-new-feature

Deploy to live

    phing deploy-live

Updating your build.xml file
============================
If you've changed the build.xml file you'll need to update it before you run the
next deployment. This can easily be done via:

    phing self-update

This copies the latest version of build.xml and the Tasks folder from the master 
branch to your project root folder.

If your build.xml file is in a custom location in your project please update the 
property *phing.source.dir*

Website document root & Maintenance page
========================================
The 'live' and 'staging' symlinks will point to the project root, this will not
be the actual document root. Usually the document root resides in */web*, and 
your maintenance page will reside in */maintenance/web*

Keeping the same document root sub-folders in maintenance will help ensure the 
maintenance page works. If you have a different document root, you will need to 
ensure you have the correct sub-folders in the maintenance folder to mirror the 
main website document root. 

For example, on a CMS v2 project the document root may be:

    sites/cambridgebs.co.uk/public

Therefore, the maintenance document root is:

    maintenance/sites/cambridgebs.co.uk/public

Phing documentation
===================
For further information see [http://www.phing.info/docs/guide/stable/](http://www.phing.info/docs/guide/stable/)