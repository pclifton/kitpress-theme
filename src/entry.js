import $ from '../node_modules/jquery';
// Make jQuery available globally (required for Foundation)
window.$ = window.jQuery = $;

require('../node_modules/featherlight-webpack/src/featherlight');

import { ResponsiveToggle } from '../node_modules/foundation-sites/js/foundation.responsiveToggle';

$(function(){
	var $toggle = new ResponsiveToggle('#main-menu-toggle');
});