=== User Submitted Posts ===

Plugin Name: User Submitted Posts
Plugin URI: http://perishablepress.com/user-submitted-posts/
Description: Enables your visitors to submit posts and images from anywhere on your site.
Tags: submit, public, share, upload, images, posts, users, user-submit, community, front-end, submissions
Author URI: http://monzilla.biz/
Author: Jeff Starr
Donate link: http://m0n.co/donate
Contributors: specialk
Requires at least: 3.7
Tested up to: 4.0
Version: 20140930
Stable tag: trunk
License: GPL v2 or later

User Submitted Posts enables your visitors to submit posts and images from anywhere on your site.

== Description ==  

Adds a basic form via template tag or shortcode that enables your visitors to submit posts and upload images. User-submitted posts optionally include tags, categories, post titles, and more. You can set submitted posts as draft, publish immediately, or after some number of approved posts. Also enables users to upload multiple images when submitting a post. Everything super-easy to customize via Admin Settings page.

**Pro Version**

USP Pro now available at [Plugin Planet](http://plugin-planet.com/usp-pro/)!

**Features**

* Let visitors submit posts from anywhere on your site
* Option to set submitted images as featured images
* Option to use WP's built-in rich text editor for post content
* Use template tag or shortcode to display the submission form anywhere
* Includes input validation and customizable captcha and hidden field to stop spam
* Post submissions may include title, tags, category, author, url, post and image(s)
* Redirect user to anywhere or return to current page after successful post submission
* Includes a set of template tags for displaying and customizing user-submitted posts
* HTML5 submission form with streamlined CSS styles
* NEW! Use your own custom form template and stylesheet
* NEW! 14 action/filter hooks for advanced customization

**More Features**

* Option to receive email alert for new submitted posts
* Option to set logged-in username as submitted-post author
* Option to set logged-in user&rsquo;s URL as the submitted URL
* Option to set a default submission category via hidden field
* Option to disable loading of external JavaScript file
* Option to specify URL for targeted resource loading
* Multiple emails supported in email alerts

**Image Uploads**

* Optionally allow/require visitors to upload any number of images
* Specify minimum and maximum width and height for uploaded images
* Specicy minimum and maximum number of allowed image uploads for each post
* Includes jQuery snippet for easy choosing of multiple images
 
**Customization**

* Control which fields are displayed in the submission form
* Choose which categories users are allowed to select
* Assign submitted posts to any registered user
* Customizable success, error, and upload messages
* Plus options for the captcha, auto-publish, and redirect-URL
* Option to use classic form, HTML5 form, or disable only the stylesheet

**Post Management**

* Custom-fields saved with each post: name, IP, URL, and any image URLs
* Set submitted posts to any status: Draft, Publish, or Moderate
* One-click post-filtering of user-submitted posts on the Admin Posts page
* Includes template tags for easy display of post attachments and images

== Installation ==

**Overview**

1. Upload the `/user-submitted-posts/` directory to your plugins folder and activate
2. Go to the "User Submitted Posts" Settings Page and customize your options
3. Display the submission form on your page(s) using template tag or shortcode

**Important**

NOTE that this plugin attaches uploaded images as custom fields to submitted posts. Attached images are not displayed automatically in posts, but rather may be displayed using template tags, either WP's built-in tags or the USP template tags (explained below). This provides maximum flexibility in terms of customizing the display of uploaded images. 

**Displaying the submission form**

* To display the form on a post or page, use the shortcode: `[user-submitted-posts]`
* To display the form anywhere in your theme, use the template tag:

	&lt;?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?&gt;

**Customizing the submission form**

There are three main ways of customizing the form:

* Via the plugin settings, you can show/hide any field, customize options, and more
* By adding a custom form template to the `/custom/` directory, for example:
	* Add a custom form template: `/custom/user-submitted-posts.php`
	* Add a custom CSS stylesheet: `/custom/usp.css`
* By using USP action/filter hooks (advanced):

`Filters:
usp_post_status
usp_post_author
usp_form_shortcode
usp_mail_subject
usp_mail_message
usp_new_post
usp_input_validate

Actions
usp_submit_success
usp_submit_error
usp_insert_before
usp_insert_after
usp_files_before
usp_files_after
usp_current_page`

More info about [WordPress Actions and Filters](http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters)

**Customizing user-submitted posts**

User-submitted posts are just like any other post, with the exception that they each contain a set of custom fields. The custom fields include extra information about the post:

* `is_submission` - indicates that the post is in fact user-submitted
* `user_submit_image` - the URL of the submitted image (one custom field per image)
* `user_submit_ip` - the IP address of the submitted-post author
* `user_submit_name` - the name of the submitted-post author
* `user_submit_url` - the submitted URL

So when user-submitted posts are displayed on your website, say on the home page or single-view, these custom fields are available to you in your theme files. This enables you to customize the user-submitted posts by displaying the submitted name, URL, images, and so forth. Here are two articles for those new to using WordPress custom-fields:

* [WordPress Custom Fields, Part I: The Basics](http://perishablepress.com/wordpress-custom-fields-tutorial/)
* [WordPress Custom Fields, Part II: Tips and Tricks](http://perishablepress.com/wordpress-custom-fields-tips-tricks/)

**Template Tags**

Additionally, the USP plugin also includes a set of template tags for customizing your user-submitted posts:

	usp_is_public_submission()
	Returns a boolean value indicating whether the specified post is a public submission
	Usage: <?php if (function_exists('usp_is_public_submission')) usp_is_public_submission(); ?>

	usp_get_post_images()
	Returns an array of URLs for the specified post image
	Usage: <?php $images = usp_get_post_images(); foreach ($images as $image) { echo $image; } ?>

	usp_post_attachments()
	Prints the URLs for all post attachments.
	Usage:  <?php if (function_exists('usp_post_attachments')) usp_post_attachments(); ?>
	Syntax: <?php if (function_exists('usp_post_attachments')) usp_post_attachments($size, $beforeUrl, $afterUrl, $numberImages, $postId); ?>
	Parameters:
		$size         = image size as thumbnail, medium, large or full -> default = full
		$beforeUrl    = text/markup displayed before the image URL     -> default = &lt;img src="
		$afterUrl     = text/markup displayed after the image URL      -> default = " /&gt;
		$numberImages = the number of images to display for each post  -> default = false (display all)
		$postId       = an optional post ID to use                     -> default = uses global post

	usp_author_link()
	For public-submitted posts, this tag displays the author's name as a link (if URL provided) or plain text (if URL not provided)
	For normal posts, this tag displays the author's name as a link to their author's post page
	Usage: <?php if (function_exists('usp_author_link')) usp_author_link(); ?>

These template tags should work out of the box when included in your theme template file(s). Keep in mind that for some of the tags to work, there must be some existing submitted posts and/or images available. 

For more information, check out the template-tag file at: `/library/template-tags.php`

**Additional Notes**

Here's a quick tutorial for [automatically setting submitted images as featured images](http://wp-mix.com/set-attachment-featured-image/) (aka post thumbnails).

== Upgrade Notice ==

__Important!__ Many things have changed in the new version of the plugin. Please copy/paste your current USP settings to a safe place. Then update the plugin as usual, using your saved settings while configuring the new version.

== Screenshots ==

Screenshots available at the [USP Homepage](http://perishablepress.com/user-submitted-posts/)

== Changelog ==

= 20140930 =

* Removes required attribute from default form textarea
* Removes "exclude" from type on redirect-override in default form
* Adds class "exclude" and "hidden" to redirect-override in default form

= 20140927 =

* Tested on latest version of WordPress (4.0)
* Increases min-version requirement to 3.7
* Improves layout and styles of plugin settings page
* Adds Romanian translation - thanks [Hideg Andras](http://www.blue-design.ro/)
* Adds Persian (Farsi) translation - thanks [Pooya Behravesh](http://icomp.ir/)
* Adds French translation - thanks [Mirko Humbert](http://www.designer-daily.com/) and [Matthieu Solente](http://copier-coller.com/)
* Updates default mo/po translation files
* Updates Parsley.js to version 2.0
* Updates usp.css with styles for Parsley 2.0
* Updates captcha-check script for Parsley 2.0
* Updates markup in default form for Parsley 2.0
* Replaces call to wp-load.php with wp_print_scripts
* Replaces sac.php with individual JavaScript libraries
* Improves logic of usp_enqueueResources() function
* Improves logic of min-file check JavaScript
* Removes ?version from enqueued resources
* Adds option to use "custom" form and stylesheet
* Removes deprecated "classic" form, submission-form-classic.php and usp-classic.css
* Removes `novalidate` from default form
* Removes `data-type="url"` from default form
* Removes `.usp-required` classes from default form
* Removes `id="user-submitted-tags"` from default form
* Removes `<div class="usp-error"></div>` from default form
* Adds "Please select a category.." to category select field
* Updates CSS for default form, see list at http://m0n.co/e
* Replaces some stripslashes() with sanitize_text_field()
* Replaces some htmlentities() with sanitize_text_field()
* Fixes bug where too big/small images would not trigger error
* Adds post id and error as query variable in return URL
* Adds sanitize_text_field() to usp_currentPageURL()
* Adds the following filter hooks:
	* `usp_post_status`
	* `usp_post_author`
	* `usp_form_shortcode`
	* `usp_mail_subject`
	* `usp_mail_message`
	* `usp_new_post`
	* `usp_input_validate`
* Adds the following action hooks:
	* `usp_submit_success`
	* `usp_submit_error`
	* `usp_insert_before`
	* `usp_insert_after`
	* `usp_files_before`
	* `usp_files_after`
	* `usp_current_page`

= 20140308 =

* usp_require_wp_version() now runs only on plugin activation

= 20140123 =

* Tested with latest version of WordPress (3.8)
* Added trailing slash to load_plugin_textdomain()
* Increased WP minimum version requirement from 3.3 to 3.5
* Added popout info about Pro version now available
* Added Spanish translation; thanks to [María Iglesias](http://www.globalcultura.com/)
* Change CSS for "USP" button to display after the "Filter" button on edit.php
* Added 8px margin to "Empty Trash" button on the Post Trash screen
* Changed handle from "uspContent" to "uspcontent" for wp_editor()
* Added class ".usp-required" to input fields (for use with JavaScript)
* Fixed issue of submitted posts going to Trash when a specific number of images is required AND the user submits the form without selecting the required number of images. JavaScript now checks for required image(s) and will not allow the form to be submitted until the user has selected the correct number of images.
* Improved logic responsible for displaying file input fields and the "Add Another Image" button
* Added option to display custom markup for "Add Another Image" button
* Replaced select fields with number inputs for settings "minimum/maximum number of images"
* Added `href`, `rel`, and `target` attributes to $allowed_atts
* Made default options translatable, generated new mo/po templates
* Streamlined plugin settings intro panel

= 20131107 =

* Added i18n support
* Added uninstall.php file
* Removed "&Delta;" from `die()`
* Added "rate this plugin" links
* Added Brazilian Portuguese translation; thanks to [Daniel Lemes](http://www.tutoriart.com.br/)
* Added notes about support for multiple email addresses for email alerts
* Increased `line-height` on settings page `<td>` elements
* Added `.inline` class to some plugin settings
* Changed CSS for `#usp_admin_filter_posts` in usp-admin.css
* Changed link text on Post filter button from "User Submitted Posts" to "USP"
* Fixed backwards setting for captcha case-sensitivity
* Added `is_object($post)` to `usp_display_featured_image`; Thanks to [Larry Holish](holish.net)
* Changed `application/x-javascript` to `application/javascript` in usp.php
* Removed `getUrlVars` function and changed "forget input values" to use a simpler regex; Thanks to [Larry Holish](holish.net)
* Tricked out `wp_editor` with complete array in both submission-form files
* Added note on settings screen about deprecating the "classic" submit form
* Replaced `wp-blog-header.php` with `wp-load.php` in usp.php
* Improved sanitization of POST variables
* Added check for empty content when content textarea is displayed on form
* Removed closing `?>` from user-submitted-posts.php
* Tested with latest version of WordPress (3.7)
* Fleshed out readme.txt with even more infos
* General code cleanup and maintenance

= 20130720 =

* Added option to set attachment as featured image
* Improved localization support (.mo and .po)
* Added optional use of WP's built-in rich text editor
* Added custom stylesheet for WP's rich text editor
* Replace antispam placeholder in submission-form.php
* Improved jQuery for "add another image" functionality
* Added jQuery script to remember form input values via cookies
* Added data validation for input fields via Parsley @ http://parsleyjs.org
* Overview and Updates panels now toggled open by default
* Updated CSS styles for HTML5 and Classic forms
* Improved logic for form verification JavaScript
* Resolved numerous PHP notices and warnings
* Updated readme.txt with more infos
* General code check n clean

= 20130104 =

* Added explanation of plugin functionality in readme.txt
* Fixed character encoding issue for author name
* Added margins to submit buttons (to fix WP's new CSS)
* Removed "anti-spam" text from captcha placeholder attribute
* usp_post_attachments() tag now accepts custom sizes
* Added temp fix for warning: "getimagesize(): Filename cannot be empty"
* Restyled USP filter button on admin Posts pages

= 20121120 =

* added id to tag input field in submission-form.php
* enabled option to disable loading of external JavaScript file
* enabled option to specify URL for targeted resource loading
* added `fieldset { border: 0; }` to usp.css stylesheet
* increased width of anti-spam input field (via usp.css)
* changed the order of input fields in submission-form.php
* fixed loading of resources on success and error pages
* added field for custom content to display before the USP form
* enable HMTL for success, error, and upload messages
* fixed issue with content not getting included in posts

= 20121119 =

* increased default image width and height
* comment out output start in three files
* remove echo output for input value attributes
* cleaned up placeholders with clearer infos
* remove usp_validateContent() function
* remove conditional if for content in usp_checkForPublicSubmission() [1]
* [1] default text no longer added to posts when empty
* remove content validation in usp_createPublicSubmission()
* added option to receive email alert for new submissions
* added option to set author as current user
* added option to set author url as usp url
* added option to set category as hidden
* submission-form.php &amp; submission-form-classic.php: changed markup output for success &amp; error messages

= 20121108 =

* Fixed non-submission when title and other fields are hidden

= 20121107 =

* Rebuilt plugin and optimized code using current WP API
* Redesigned settings page, toggling panels, better structure, more info, etc.
* Errors now redirect to specified page (if set) or current page
* Fixed bug to allow for unlimited number of uploaded images
* Cleaned up template tags, added inline comments
* Optimized/enhanced the user-submission form
* Added option to restore default settings
* Added settings link from Plugins page
* Renamed CSS and JavaScript files
* Added challenge question captcha
* Added hidden field for security
* Added option for custom success message
* Submission form now retains entered value if error
* Added placeholder attributes to the form fields
* Submissions including invalid upload files now redirect to form with error message
* Fixed default author of submitted posts
* the_author_link is not filterable, so created new function usp_author_link
* moved admin styles from form stylesheet to admin-only stylesheet
* Added new HTML5 form and stylesheet, kept originals as "classic" version

= 1.0 =

* Initial release

== Frequently Asked Questions ==

**Can you add this feature or that feature?**

Please check the premium version of the plugin, which includes many of the most commonly requested features from users. The free version may incorporate some new features as well in future updates.

**Images are not uploaded or displaying**

There are several things that can interfere with uploading files:

* Check the permission settings on the upload folder(s) by ensuring that you can successfully upload image files thru the Media Uploader. 
* Double-check that all the image-upload settings make sense, and that the images being uploaded meet the specified requirements.

Note: when changing permissions on files and folders, it is important to use the least-restrictive settings possible. If you have to use more permissive settings, it is important to secure the directory against malicious activity. For more information check out: [Secure Media Uploads](http://digwp.com/2012/09/secure-media-uploads/)

Update: new posts at [WP-Mix](http://wp-mix.com/) that should be useful for this: [Display all images attached to post](http://wp-mix.com/display-images-attached-post/) and [Display images with links](http://wp-mix.com/display-images-with-user-submitted-posts/)

**How to set submitted image as the featured image?**

Visit the "Options" panel in the plugin settings and select "Set Uploaded Image as Featured Image". Note that this setting merely assigns the submitted image as the Featured Image for the post; it's up to your theme's single.php file to include `the_post_thumbnail()` to display the Featured Images. Update: I've posted a quick tutorial at [WP-Mix](http://wp-mix.com/set-attachment-featured-image/).

**How to require login?**

Here's a quick tutorial for [requiring user login for any plugin](http://wp-mix.com/require-user-login-any-plugin/).

Here is another way of doing it (customize as needed):

`if (is_user_logged_in()) {
	// the user is logged in, so display the submission form
	if (function_exists('user_submitted_posts')) user_submitted_posts();
} else { 
	// the user is not logged in, so redirect to any URL and exit
	header('Location: http://example.com/');
	exit;
}`

Also check out [Members-only content via shortcode](http://wp-mix.com/members-only-content-shortcode/) at WP-Mix.

**How do I change the appearance of the submission form?**

Custom CSS may be used to change the appearance of the submission form. By default, there are two pre-styled forms (HTML5 and Classic) that may be selected from the "Options" panel. Once you've selected one of these, you may customize the CSS by editing either "usp.css" (for HTML5 form) or "usp-classic.css" (for Classic form) located in the plugin's `/resources/` directory. 

Alternately, check to disable the stylesheet for the "Form style" setting in the plugin's "Options" panel. That will ensure that any existing CSS styles are not applied, leaving you with a blank (unstyled) slate with which to work. Then you may customize the form's appearance by adding CSS to your theme's stylesheet, `style.css` (or elsewhere).

**How do I manually modify the submission form?**

To make changes to the submission form, edit either `submission-form-classic.php` or `submission-form.php`, depending on your settings (see "Form style" in the "Options" panel).

**Will this work with my theme**

USP is designed to work with any compatible theme running on WordPress version 3.3 or better.

**What about security and spam?**

USP uses the WordPress API to keep everything secure, and includes a captcha and hidden field to stop spam and bots.

**Can I include video?**

The free version of the plugin supports only image uploads, but some hosted videos may be included in the submitted content (textarea) by simply including the video URL on its own line. See [this page](http://codex.wordpress.org/Embeds) for more info.

**More Questions &amp; Answers**

Question: "I'm using the user submitted post plugin, and i'm realy loving it.. But i have some trouble with the page speed, when i analyse my site with google page speed i get the following errors: Remove Javascript-code that block loading of the site [...] Anf optimize CSS appearense."

Answer: Sure, there is an "Include JavaScript?" setting to enable/disable the JavaScript. For the CSS, select the option to "Disable stylesheet" under the "Form style" setting. That gives you full control over when and where scripts and styles are included on the page. 

Question: "i want to know where i find the informations that the user insert (specially his name and email that he insert in the form of user submitted post) , or i want to know the name of the table in data base."

Answer: No database table is created but the option for the user's name is "usp_name". There is no option for the user's email.

Question: "In your FAQs you mention about a paid version that allows a video field? i cant find any further information on it? Is there a way i can add this to the form?"

Answer: It's available at [Plugin Planet](http://plugin-planet.com/usp-pro/). And/or as a workaround in the free version, you can use WP's built-in oEmbed functionality to allow visitors to include video URLs and WP will then embed automatically in the posts. 

Question: "I'm new to wordpress and just installed your plugin User Submitted posts. What template do I add the code to have it work everywhere."

Answer: It really depends on the theme, as each tends to use template files differently.. it also depends on where on the page you would like to display the form, for example the sidebar (sidebar.php), the footer (footer.php), and so forth. Also, chances are that you'll need to add the form to more than one template file, for example index.php and page.php, etc. A good first place to try would be the sidebar, or maybe index.php and then go from there.

Question: "I have the option for multiple image uploads enabled in the plug-in settings however it does not work on the site. When you click on the Add another image text nothing happens."

Answer: The "Add another image" link is dependent on the required JavaScript being included in the page. Check the plugin setting to "Include JavaScript?" and you should be good to go.

Question: "I really like the new Rich Text editor, but the Add Media button only shows up if I'm logged in to the site, and so nobody else can see it. Is there a way to change that so that all readers wanting to submit something can use that button?"

Answer: As far as I know the user must be logged in to have access to file uploads, Media Library and the uploader. This is a security measure aimed at preventing people who don't know what they're doing from making a horrible, horrible mistake. Never allow open access to file uploads.

Question: "Im trying to use your plugin, User Submitted posts but when I upload images via the form, they dont actually upload. I was wondering if you could help me with this?"

Answer: Some things to check:

1. Read the readme.txt file
2. Are the images uploaded to the WP Media Library?
3. Are you able to upload images directly via the Media Library?
4. Do you see the image URL as a custom field (on Edit Post screen)?

That should help troubleshoot or get some clues going.

Question: "I have it set so that articles get submitted under the users name. Sometimes when a user submits an article the article gets submitted under the users name, and other times set as the default user as set in the settings. When the article gets set to the default user I cannot change it in wordpress, I need to copy and paste the whole article to a new article and then set it to the proper user."
Answer: The registered username of the submitter can be used for post author only when they are logged in to WP (otherwise it's difficult to "guess" their identity). So if a registered user does not log in and guest posting is enabled, their post will be submitted with the submitted name as the post author. Thus, to resolve the dilemma posed in the question, one solution is to require users to be logged in to submit posts.

**Got questions?**

To ask a question, visit the [USP Homepage](http://perishablepress.com/user-submitted-posts/) or [contact me](http://perishablepress.com/contact/).

== Donations ==

I created this plugin with love for the WP community. To show support, consider purchasing one of my books: [The Tao of WordPress](http://wp-tao.com/), [Digging into WordPress](http://digwp.com/), or [.htaccess made easy](http://htaccessbook.com/).

Links, tweets and likes also appreciated. Thanks! :)
