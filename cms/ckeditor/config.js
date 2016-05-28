/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.filebrowserBrowseUrl = '/cms/kcfinder/browse.php?type=files';
	config.filebrowserUploadUrl = '/cms/kcfinder/upload.php?type=files';//config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
    config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?type=images';
    config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
};
