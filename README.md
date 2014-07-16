Activist Network
=========

The Activist network is a pre-configured WordPress Multisite that allows activists & organizers to create a space where groups and projects can have their own website within a network and the news, events & user profiles are shared across the network and highlighted on the main site.


The flow chart below provides an idea of what a network would look like with one main site displaying the data and being the face of the network for each sub site to communicate and share with their communities

## Functionality

This section refers to the back-end/admin features needed to organize the content within the templates. We will build around WordPress core.

### News


News is the posts (or blog) section of the site. Content here can be formatted around taxonomies & post formats.


### Taxonomy


The default taxonomies in WordPress are the Categories & Tags. This can be used as default and through provide training & documentation on best practices for usage.


### Post Formats


Post Formats, refer to the type of content which is connected to templates in the theme. The formats available in WordPress for use are:


* **aside**  - Typically styled without a title. Similar to a Facebook note update.
* **gallery**  - A gallery of images. Post will likely contain a gallery shortcode and will have image attachments.
* **link**  - A link to another site. Themes may wish to use the first <a href=â€â€> tag in the post content as the external link for that post. An alternative approach could be if the post consists only of a URL, then that will be the URL and the title (post_title) will be the name attached to the anchor for it.
* **image**  - A single image. The first image tag in the post could be considered the image. Alternatively, if the post consists only of a URL, that will be the image URL and the title of the post (post_title) will be the title attribute for the image.
* **quote**  - A quotation. Probably will contain a blockquote holding the quote content. Alternatively, the quote may be just the content, with the source/author being the title.
* **video**  - A single video. The first <video /> tag or object/embed in the post content could be considered the video. Alternatively, if the post consists only of a URL, that will be the video URL. May also contain the video as an attachment to the post, if video support is enabled on the blog (like via a plugin).
* **audio**  - An audio file. Could be used for Podcasting.
* <del>**chat**  - A chat transcript, like so:</del> 


### Social Integration


Explore using Keyring to accomplish this around post formats. This actually archives data on the site as opposed to the only leaving on commercial/proprietary network.


* [[http://wordpress.org/plugins/keyring/|http://wordpress.org/plugins/keyring/]]
* [[http://wordpress.org/plugins/keyring-social-importers/|http://wordpress.org/plugins/keyring-social-importers/]]


## Events

This is a custom post type created using the [[http://wordpress.org/plugins/events-manager/|Events Manager]] plugin that allows for a creation of global (or shared) events table to display events from all sub-sites on the main site. There is a wide variety of options available through the admin area of the site for customizations on a site by site basis and there are some network wide settings that allows for easier management.


## User Profiles

Individuals will be able to register as users to the network to get notifications and add content based on what the site admins decide. For this front-end profile pages will be provided for users to add their bio and social links to appear below each post or event they post and create a custom author or user template. For this we will use:


*  [[http://wordpress.org/plugins/wp-biographia/|http://wordpress.org/plugins/wp-biographia/]]
  * There are a lot of settings to allow site admins ways to control where this information appears. The rest is controlled within templates.
*  [[http://wordpress.org/plugins/theme-my-login/|http://wordpress.org/plugins/theme-my-login/]]
  * Provider frontend login, logout, reset password pages and a widget that allows to show links based on user role.
* [[http://wordpress.org/plugins/join-my-multisite/|http://wordpress.org/plugins/join-my-multisite/]] (if already a user on one site, if a user tries to register again it won't work, this will allow them to register to multiple sites with the same username.)


## Templates
TBD