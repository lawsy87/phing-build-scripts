Phing build scripts
===================

*Please note this is in progress*

Collection of common Phing build scripts for Studio 24 web projects

See INSTALL.md for installation instructions.

Usage
-----

Deploy to staging

    phing deploy-staging

Deploy a branch to staging (not available for live deployments)

    # Deploy feature/shiny-new-feature to staging
    phing deploy-staging -Dbranch feature/shiny-new-feature

Deploy to live

    phing deploy-live

Updating your build.xml file
----------------------------
If you've changed the build.xml file you'll need to update it before you run the
next deployment. This can easily be done via:

    phing self-update

This copies the latest version of build.xml and the Tasks folder from the master 
branch to your project root folder.

It is recommended you keep your build.xml scripts in *scripts/phing* for 
consistency. If your build.xml file is in a custom location in your project 
please update the property *phing.source.dir*. 

Phing documentation
-------------------
For further information see [http://www.phing.info/docs/guide/stable/](http://www.phing.info/docs/guide/stable/)