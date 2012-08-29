<?php
/**
 * Integrate debugging with debug bar plugin.
 *
 * @since 1.0
 * @author Ben Lobaugh
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

add_filter( 'debug_bar_panels', 'ships_log_load_debug_bar' );
function ships_log_load_debug_bar($panels) {
	if (!class_exists('SHIPS_LOGDebugBar') && class_exists('Debug_Bar_Panel')) {
		class SHIPS_LOGDebugBar extends Debug_Bar_Panel {

			private static $debug_log = array();
			
			function init() {
                                // Title to display in left column of debug bar
				$this->title( __('Ships Log', SHIPS_LOG_TEXTDOMAIN) );
                                
                                // Custom styling for the debug bar output
				wp_enqueue_style( 'bl-debug-bar-css', SHIPS_LOG_PLUGIN_URL . 'css/debug-bar.css' );
                                
                                // Action hook called when new dbug info is submitted
                                add_action( 'ships_log_debug', array( &$this, 'logDebug' ), 10, 3 );
                                
			}

			function prerender() {
				$this->set_visible( true );
			}

			function render() {
				echo '<div id="bl-debug-bar">';
				if (count(self::$debug_log)) {// echo "<pre>";var_dump(self::$debug_log); echo '</pre>';
					echo '<ul>';
					foreach(self::$debug_log as $k => $v) {
						echo "<li class='bl-debug-{$v['format']}'>";
						echo "<div class='bl-debug-entry-title'>{$v['title']}</div>";
                                                
						if ( 'dump' != $v['format'] ) {
							echo '<div class="bl-debug-entry-data">';
							echo $v['data'];
							echo '</div>';
						} else {
                                                    dBug( $v['data'] );
                                                }
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</div>';
			}

			/**
			 * log debug statements for display in debug bar
			 *
                         * @since 1.0
			 * @param string $title - message to display in log
			 * @param string $data - optional data to display
			 * @param string $format - optional format (log|warning|error|notice|dump)
			 * @return void
			 * @author Ben Lobaugh
			 */
			public function logDebug($title, $data, $format) { 
				self::$debug_log[] = array(
					'title' => $title,
					'data' => $data,
					'format' => $format,
				);
			}
		}
		$panels[] = new SHIPS_LOGDebugBar;
	}
	return $panels;
}


