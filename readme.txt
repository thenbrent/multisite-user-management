=== Multisite User Management ===
Contributors: thenbrent
Tags: multisite
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 0.1

Add new users to every site in a MultiSite WordPress installation with a default role you choose.

== Description ==

Running a MultiSite WordPress? You no longer need to be manually add new users to each of your sites. 

With this plugin, when a new user activates their account, they will be assigned a role for each of your sites.

You determine the default role for each site under the "Super Admin | Options" menu.

== Installation ==

Upload the multisite-user-management.php file to the wp-content/mu-plugins directory (you can discard the multi-site-user-management directory and contents). 

The mu-plugins folder is not created by default, therefore, you may need to create it under wp-content. This plugin will only work in the mu-plugins directory. 

After being uploaded to mu-plugin, the plugin will be activated automatically.

Once installed in the correct location, you will find a "Multisite User Management" section under "Super Admin | Options" page.

== Frequently Asked Questions ==

= Does this require a MultiSite installation? =

Yes, WordPress takes care of the default role on non-MultiSite installations.

= Why can't I install this plugin in the wp-content/plugins directory? =

WordPress MultiSite accesses the standard plugins directory after a user is activated; therefore, the activation code in this plugin will not be called.

= Does this assign roles to existing users? =

No, at this stage it is only for new users. If you would like it to support existing users, submit a ticket as per the instructions below.

= Does this assign roles for new blogs? =

No, it is only for new users. If you would like it to create a default role for blog and new users also registering a blog, submit a ticket as per the instructions below.

= Where can I make feature requests, get support & report bugs? =

Submit an Issue on the github page here: http://github.com/thenbrent/multisite-user-management/issues

== Screenshots ==

1. **Super Admin Options** - Super admins can choose the default role for each site. New users be allocated this role when activating their account.

