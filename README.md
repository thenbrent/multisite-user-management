# Multisite User Management

Automatically add users to each site in your WordPress network.

## Description

Running a WordPress network? You no longer need to manually add new users to each of your sites.

With this plugin, users are assigned a default role for each of your sites. You set the default role for each site and this plugin applies it. 

You can assign different roles for each site or keep a site private by assigning no role.

## Installation

1. Upload the entire `/multisite-user-management/` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin.
1. Navigate to the **Multisite User Management** section of the *Network Admin > Settings > Network Settings* page. At `example.com` this page would be found at `http://example.com/wp-admin/network/settings.php`.
1. Set default roles for each of your sites.

## Frequently Asked Questions

### Does the plugin require a multisite installation?

Yes, WordPress takes care of the default role on non-multisite installations.

### Where do I find the settings section

The **Multisite User Management** section is near the bottom of the the *Network Admin > Settings > Network Settings* page. 

For `example.com` this page would be found at `http://example.com/wp-admin/network/settings.php`.

### Why aren't all my sites listed on the options page?

Any sites archived or deleted will not appear. All others sites will appear. 

If you do not see your sites, be sure you are looking at the *Network Settings* Page found at `/wp-admin/network/settings.php` not a single site settings, found at `/wp-admin/settings.php`.

### Does this plugin assign the default role to existing users?

Yes, existing users will receive the default role. If you change the default role, all of your users with the old default role will receive the new default role.

### Will these roles be allocated to new users registering with a new site?

Yes, users registering with a site will receive all the existing default roles. 

The new site will not have a default role until it is manually set. Once set, all existing users will receive that role for the new site.

### Why aren't my users allocated the role and showing up on all sites?

Sometimes magic happens. 

To re-apply a role to all users on all sites, you must:

1. Change the default role for every site listed in the settings page (even if the role is set to the role you want for that site, change it just for now). Every role must be different.
1. Save the settings.
1. If any of the roles are set to something other than the role you want, change the role to the one you want.
1. Save the settings.

All users in your database should now be assigned a role for all sites.

### Where can I report bugs?

Add a new topic on the [WordPress Support Forum](http://wordpress.org/tags/multisite-user-management).
