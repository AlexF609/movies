<?php
/**
 * Copyright (C) 2014-2019 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Kangaroos cannot jump here' );
}

// ==================
// = Plugin Version =
// ==================
define( 'AI1WMUE_VERSION', '2.31' );

// ===============
// = Plugin Name =
// ===============
define( 'AI1WMUE_PLUGIN_NAME', 'all-in-one-wp-migration-unlimited-extension' );

// ============
// = Lib Path =
// ============
define( 'AI1WMUE_LIB_PATH', AI1WMUE_PATH . DIRECTORY_SEPARATOR . 'lib' );

// ===================
// = Controller Path =
// ===================
define( 'AI1WMUE_CONTROLLER_PATH', AI1WMUE_LIB_PATH . DIRECTORY_SEPARATOR . 'controller' );

// =============
// = View Path =
// =============
define( 'AI1WMUE_TEMPLATES_PATH', AI1WMUE_LIB_PATH . DIRECTORY_SEPARATOR . 'view' );

// ===============
// = Vendor Path =
// ===============
define( 'AI1WMUE_VENDOR_PATH', AI1WMUE_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor' );

// ===========================
// = ServMask Activation URL =
// ===========================
define( 'AI1WMUE_ACTIVATION_URL', 'https://servmask.com/purchase/activations' );

// =================
// = Max File Size =
// =================
define( 'AI1WMUE_MAX_FILE_SIZE', 0 );

// ===============
// = Purchase ID =
// ===============
define( 'AI1WMUE_PURCHASE_ID', 'ee7401ee-d3f3-49aa-856c-b380d1e55cfb' );
