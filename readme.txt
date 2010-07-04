=== Multisite User Management ===
Contributors: thenbrent
Tags: multisite
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 0.1

Automatically add new users to each site in your MultiSite WordPress installation.

== Description ==

Running a MultiSite WordPress? You no longer need to manually add new users to each of your sites. 

With this plugin, new users are assigned a role for each of your sites. You determine the default role for each site under the **Multisite User Management** section of the *Super Admin | Options* page.

You can assign different roles for each site or no roles if you want some site's to be kept private.

== Installation ==

Please follow these instructions carefully. As the plugin hooks to special MultiSite functions, it requires a slightly different installation than your vanilla WordPress plugin. 

1. Upload only the `ms-user-management.php` file to the `wp-content/mu-plugins/` directory (you can discard the multi-site-user-management directory and its contents). 
1. After being uploaded to `mu-plugins`, the plugin will be activated automatically.
1. Navigate to the **Multisite User Management** section of the *Super Admin | Options* page and set the default role for each of your sites.

NB. WordPress does not create the `mu-plugins` directory by default, therefore, you may need to create it. This plugin will not work in the `wp-content/plugins` directory. 

== Frequently Asked Questions ==

= Does this require a MultiSite installation? =

Yes, WordPress takes care of the default role on non-MultiSite installations.

= Why don't all my sites show up in the list? =

Only blogs marked as public and flagged as safe (mature flag off) are included in the list.

= Why can't I install this plugin in the wp-content/plugins directory? =

WordPress accesses the standard plugins directory after a user is activated; therefore, this plugin will not be called. Don't worry though, you won't be able to set default roles unless the plugin is installed in the correct location.

= Does this assign roles to existing users? =

No, it is only for new users. If you would like it to support existing users, submit a ticket as per the instructions below.

= Does this assign roles for new blogs and new blog registrations? =

No, it is only for new user registrations. If you would like it to create a default role for new blogs and new users also registering a blog, submit a ticket as per the instructions below.

= Where can I make feature requests, get support & report bugs? =

Submit an Issue on the plugin's [Github page](http://github.com/thenbrent/multisite-user-management/issues).

== Screenshots ==

1. **Super Admin Options** - Super admins can choose the default role for each site. New users be allocated this role when activating their account.

== Changelog ==

= 0.1 =
* Initial release.
