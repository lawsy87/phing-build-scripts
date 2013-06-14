Phing deployment scripts
------------------------

Installation
============

1) Install phing with the following dependencies:

    pear channel-discover pear.phing.info
    pear install --alldeps phing/phing
    pear install -a Mail
    pear install -a Mail_Mime 
    pear install VersionControl_Git-alpha
    
If you need to upgrade PEAR to the latest version use:

    pear install --force PEAR-1.9.4

2) Copy build.xml and the Tasks folder to the client root folder 

3) See README.md for usage instructions