=== Multisite User Management ===
Contributors: thenbrent
Tags: multisite
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 0.5

Automatically add new users to each site in your multsite WordPress installation.

== Description ==

Running a WordPress network? You no longer need to manually add new users to each of your sites.

With this plugin, users are assigned a default role for each of your sites. You determine the default role for each site under the **Multisite User Management** section of the *Super Admin | Options* page.

You can assign different roles for each site or keep a site private by assigning no role.

== Installation ==

1. Upload the entire `/multisite-user-management/` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin.
1. Navigate to the **Multisite User Management** section of the *Super Admin | Options* page. 
1. Set default roles for each of your sites.

== Frequently Asked Questions ==

= Does the plugin require a multisite installation? =

Yes, WordPress takes care of the default role on non-multisite installations.

= Why aren't all my sites listed on the options page? =

Only blogs marked as public and flagged as safe (mature flag off) are included in the list.

= Does this plugin assign the default role to existing users? =

Yes, existing users will receive the default role. If you change the default role, all of your users with the old default role will receive the new default role.

= Will these roles be allocated to new users registering with a new site? =

Yes, users registering with a site will receive all the existing default roles. 

The new site will not have a default role until it is manually set. Once set, all existing users will receive that role for the new site.

= Why are new users registering with a site not given the default role for the dashboard site? =

This is by design in the WordPress core.

= Where can I make feature requests, get support & report bugs? =

Submit an Issue on the plugin's [Github page](http://github.com/thenbrent/multisite-user-management/issues).


== Screenshots ==

1. **Super Admin Options** - Super admins can choose the default role for each site.

== Changelog ==

= 0.5 =
* Roles now assigned on login. Plugin can now live in the wp-content/plugins directory. 

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

= 0.5 =
Important upgrade. You can now install MSUM in the default wp-content/plugins folder. This makes it easier to install and keep track of updates.

= 0.4 =
Upgrade to fix bug found when saving options page without changing roles.

= 0.3 =
Important upgrade to fix bug found when saving options page with no multisite user management option.
