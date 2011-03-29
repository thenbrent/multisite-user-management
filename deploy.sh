#! /bin/bash
# A modification of Dean Clatworthy's deploy script as found here: https://github.com/deanc/wordpress-plugin-git-svn
# The difference is that this script lives in the plugin's git repo.

# main config
PLUGINSLUG="multisite-user-management"
CURRENTDIR=`pwd`
MAINFILE="ms-user-management.php" # this should be the name of your main php file in the wordpress plugin

# git config
GITPATH="$CURRENTDIR/" # this file should be in the base of your git repository

# svn config
SVNPATH="/tmp/$PLUGINSLUG" # path to a temp SVN repo. No trailing slash required and don't add trunk.
SVNURL="http://plugins.svn.wordpress.org/multisite-user-management/" # Remote SVN repo on wordpress.org, with no trailing slash
SVNUSER="thenbrent" # your svn username

# Let's begin...
echo ".........................................."
echo 
echo "Preparing to deploy wordpress plugin"
echo 
echo ".........................................."
echo 

# Check version in readme.txt is the same as plugin file
NEWVERSION1=`grep "^Stable tag" $GITPATH/readme.txt | awk '{print $NF+0}'`
echo "before $NEWVERSION1 after"
NEWVERSION2=`grep "^Version" $GITPATH/$MAINFILE | awk '{print $NF+0}'`
echo "before $NEWVERSION2 after"

if [ "$NEWVERSION1" != "$NEWVERSION2" ]; then echo "Versions don't match. Exiting...."; exit 1; fi

echo "Versions match in readme.txt and PHP file. Let's proceed..."

# change into the git dir and get a commit message
cd $GITPATH
echo -e "Enter a commit message for this new version: \c"
read COMMITMSG
git commit -am "$COMMITMSG"

# Create a new tag and commit it :)
echo "Tagging new version in git"
git -a tag $NEWVERSION1 -m "$COMMITMSG"

# push to origin
echo "Push latest commit to origin, with tags"
#git push origin master
#git push origin master --tags

#Create temporary SVN repo
echo 
echo "Creating local copy of SVN repo ..."
svn co $SVNURL $SVNPATH

# Export git contents to svn directory
echo "Exporting the HEAD of master from git to the trunk of SVN"
git checkout-index -a -f --prefix=$SVNPATH/trunk/

# Make sure SVN is ignore this file and other files for git/github
echo "Ignoring github specific files and deployment script"
svn propset svn:ignore "deploy.sh" "$SVNPATH/"
svn propset svn:ignore "readme.md" "$SVNPATH/"

# Change to SVN dir and commit changes
echo "Changing directory to SVN and committing to trunk"
cd $SVNPATH/trunk
#svn commit --username=$SVNUSER -m "$COMMITMSG"

# Create a new tag and commit it :)
echo "Creating new SVN tag"
cd $SVNPATH
svn copy trunk/ tags/$NEWVERSION1
#svn commit --username=$SVNUSER -m "Updating tag to $NEWVERSION1"

# Remove temporary SVN directory
echo "Removing temporary directory $SVNPATH"
#rm -fr $SVNPATH/

# Ce Fin
echo "*** FIN ***"
