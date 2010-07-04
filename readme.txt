=== Multisite User Management ===
Contributors: thenbrent
Tags: multisite
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.0

Allocate new users a role for every site in a MultiSite WordPress installation.

== Description ==

Running a MultiSite WordPress? You no longer need to be manually add new users to each of your sites. 

With this plugin, when a new user activates their account, they will be assigned a role for each of your sites.

You determine the default role for each site under the Super Admin | Options menu.

== Installation ==

Upload the multisite-user-management.php file to the wp-content/mu-plugins directory. 

The mu-plugins folder is not created by default, therefore, you may need to create it under wp-content. This plugin will only work in the mu-plugins directory. 

Once uploaded to mu-plugin, the file will be activated automatically.

You can then visit "Super Admin | Options menu" to assign the default roles for each of your sites.

== Frequently Asked Questions ==

= Does this require a MultiSite installation? =

Yes, WordPress takes care of default roles on non-MultiSite installations.

= Why can't I install this plugin in the wp-content/plugins directory? =

WordPress MultiSite accesses the plugins directory after user activation. Therefore, the activation code in this plugin will not be called.

= Does this assign roles to existing users? =

No, at this stage it is only for new users. If you would like it to support existing users, submit a ticket as per the instructions below.

= Does this assign roles for new blogs? =

No, it is only for new users. If you would like it to create a default role for , submit a ticket as per the instructions below.

= Where can I get support & report a bugs? =

Submit an Issue on the github page here: http://github.com/thenbrent/multisite-user-management/issues

== Screenshots ==

1. **Super Admin Options** - Super admins can choose the default role for each site. New users be allocated this role when activating their account.

