=== Multisite User Management ===
Contributors: thenbrent
Tags: multisite
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 0.4

Automatically add new users to each site in your Multisite WordPress installation.

== Description ==

Running a Multisite WordPress? You no longer need to add new users to each of your sites manually.

With this plugin, users are assigned a default role for each of your sites. You determine the default role for each site under the **Multisite User Management** section of the *Super Admin | Options* page.

You can assign different roles for each site or no role if you want a site to be kept private.

== Installation ==

Please follow these instructions carefully. The plugin uses a special Multisite hook so it requires a slightly different installation to your vanilla WordPress plugin. 

1. Upload the `ms-user-management.php` file to the `wp-content/mu-plugins/` directory (you can discard the multisite-user-management directory and its contents). 
1. Once uploaded to `mu-plugins`, the plugin will be activated automatically.
1. Navigate to the **Multisite User Management** section of the *Super Admin | Options* page and set the default role for each of your sites.

Note: WordPress does not create the `mu-plugins` directory by default so you may need to create it. This plugin will not work in the `wp-content/plugins` directory. 

== Frequently Asked Questions ==

= Does the plugin require a Multisite installation? =

Yes, WordPress takes care of the default role on non-Multisite installations.

= Why can't I install this plugin in the wp-content/plugins directory? =

WordPress accesses the standard plugins directory after a user is activated.

= Why aren't all my sites listed on the options page? =

Only blogs marked as public and flagged as safe (mature flag off) are included in the list.

= Does this plugin assign the default role to existing users? =

Yes, existing users will receive the default role. If you change the default role, existing users with the old default role will receive the new default role.

= Will default roles be allocated to new users who are also registering a new site? =

Yes, users registering with a site will receive all the existing default roles. 

The new site will not have a default role until it is manually set. Once set, all existing users will receive that role for the new site.

= Why are new users registering with a site not given the default role for the dashboard site? =

This is by design in the WordPress core.

= Where can I make feature requests, get support & report bugs? =

Submit an Issue on the plugin's [Github page](http://github.com/thenbrent/multisite-user-management/issues).

== Screenshots ==

1. **Super Admin Options** - Super admins can choose the default role for each site.

== Changelog ==

= 0.4 =
* Fixed bug: original site did not restore when old role was the same as new role.

= 0.3 =
* Fixed bug found when updating WPMU options page with no MSUM set.

= 0.2 =
* Default roles now assigned to existing users
* New users registering with a blog are now assigned default roles for existing sites
* Fixed bugs affecting dashboad default role and activation when some sites had no default role

= 0.1 =
* Initial release.

== Upgrade Notice ==

= 0.4 =
Upgrade to fix bug found when saving options page without changing roles.

= 0.3 =
Important upgrade to fix bug found when saving options page with no multisite user management option.
