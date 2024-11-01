<?php
/*
Plugin Name: Internet Explorer 8 Accelerator
Plugin URI: http://anantgarg.com/wordpress-internet-explorer-accelerator
Description: The Internet Explorer 8 Accelerator plugin enables you to post an entry with selected text of any web-page to your WordPress blog.
Version: 1.0
Author: Anant Garg
Author URI: http://anantgarg.com
Licence: This WordPress plugin is licenced under the GNU General Public Licence. 
For more information see: http://www.gnu.org/copyleft/gpl.html

For documentation, please visit http://anantgarg.com/wordpress-internet-explorer-accelerator
*/

function ie_accelerator() {
	$url = $_POST['url'];
	$description = $_POST['description'];
	$title = $_POST['title'];

	$description = preg_replace('/\r/', '', $description);	
	$description = preg_replace('/\n/', '\\n\\n', $description);

	if ($url == "" || $title == "") {
	} else {
		?><script>

		function accelerator() {
			var url = '<?php echo $url?>';
			var title = 'Talking about <?php echo $title?>';
			title = unescape(title.replace(/\+/g,  " "));
			document.getElementById('title').value = title;

			var description = '<?php echo $description?>';
			description = unescape(description.replace(/\+/g,  " "));
			document.getElementById('content').value = '<strong><a href="'+url+'">'+title+'</a></strong>'+'\n\n'+description;
		}

		document.onload = accelerator();
		</script>
		<?php
		}
	}
add_action('edit_form_advanced', 'ie_accelerator');

?>