<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Rigel_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {}

	function end_lvl( &$output, $depth = 0, $args = array() ) {}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	   
		global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

		ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);

		$original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);

		$title = $item->title;

		if ( ! empty( $item->_invalid ) ) {
			$classes[] = 'menu-item-invalid';
			/* translators: %s: title of menu item which is invalid */
			$title = sprintf( esc_html__( '%s (Invalid)', 'rigel' ), $item->title );
		} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
			$classes[] = 'pending';
			/* translators: %s: title of menu item in draft status */
			$title = sprintf( esc_html__('%s (Pending)', 'rigel' ), $item->title );
		}

		$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;

		$submenu_text = '';
		if ( 0 == $depth )
			$submenu_text = 'style="display: none;"';

		if ( $item->megamenu ) {
			$classes[] = 'pix-megamenu-active';
		}

		?>
		<li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php esc_html_e( 'sub item', 'rigel' ); ?></span></span>
					<span class="item-controls">
						<span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
						<span class="item-type item-type-mega">(Mega Menu)</span>
						<span class="item-order hide-if-js">
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-up-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'rigel' ); ?>">&#8593;</abbr></a>
							|
							<a href="<?php
								echo wp_nonce_url(
									add_query_arg(
										array(
											'action' => 'move-down-menu-item',
											'menu-item' => $item_id,
										),
										remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
									),
									'move-menu_item'
								);
							?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'rigel' ); ?>">&#8595;</abbr></a>
						</span>
						<a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'rigel' ); ?>" href="<?php
							echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
						?>"><?php esc_html_e( 'Edit Menu Item', 'rigel' ); ?></a>
					</span>
				</dt>
			</dl>

			<div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
				<?php if( 'custom' == $item->type ) : ?>
					<p class="field-url description description-wide">
						<label for="edit-menu-item-url-<?php echo $item_id; ?>">
							<?php esc_html_e( 'URL', 'rigel' ); ?><br />
							<input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
						</label>
					</p>
				<?php endif; ?>
				<p class="description description-thin">
					<label for="edit-menu-item-title-<?php echo $item_id; ?>">
						<?php esc_html_e( 'Navigation Label', 'rigel' ); ?><br />
						<input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
					</label>
				</p>
				<p class="description description-thin">
					<label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
						<?php esc_html_e( 'Title Attribute', 'rigel' ); ?><br />
						<input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
					</label>
				</p>
				<p class="field-link-target description">
					<label for="edit-menu-item-target-<?php echo $item_id; ?>">
						<input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
						<?php esc_html_e( 'Open link in a new window/tab', 'rigel' ); ?>
					</label>
				</p>
				<p class="field-css-classes description description-thin">
					<label for="edit-menu-item-classes-<?php echo $item_id; ?>">
						<?php esc_html_e( 'CSS Classes (optional)', 'rigel' ); ?><br />
						<input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
					</label>
				</p>
				<p class="field-xfn description description-thin">
					<label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
						<?php esc_html_e( 'Link Relationship (XFN)', 'rigel' ); ?><br />
						<input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
					</label>
				</p>
				<p class="field-description description description-wide">
					<label for="edit-menu-item-description-<?php echo $item_id; ?>">
						<?php esc_html_e( 'Description', 'rigel' ); ?><br />
						<textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
						<span class="description"><?php esc_html_e('The description will be displayed in the menu if the current theme supports it.', 'rigel' ); ?></span>
					</label>
				</p>

				<?php
	            /* New fields insertion starts here */
	            //Insert Icon Field
	            ?>      
	            <p class="pix-field-custom description description-wide"><br class="clearboth"> 
	                <label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
	                    <?php esc_html_e( 'Insert Menu Icon', 'rigel' ); ?><br />
	                    <input type="hidden" id="edit-menu-item-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom edit-menu-item-icon" name="menu-item-icon[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->icon ); ?>" />
	                    <span class="pix-inserted-icon"></span>

	                    <a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> <?php esc_html_e('Insert Icon', 'rigel' ); ?></a>
	                    <a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> <?php esc_html_e('Remove Icon', 'rigel' ); ?></a>
	                </label>
	            </p>
				<?php //Mega Menu ?>
	            <p class="pix-field-custom-megamenu description description-wide">
	                <label for="edit-menu-item-megamenu-<?php echo $item_id; ?>">
	                    <?php esc_html_e( 'Mega Menu', 'rigel' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenu-<?php echo $item_id; ?>" name="menu-item-megamenu[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenu ); ?>>
							<span><span><?php esc_html_e('No','rigel' ); ?></span><span><?php esc_html_e('Yes','rigel' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>
				
				<div class="pix-field-custom-megamenucol-div">
	            <?php //Mega Menu Columns ?>
		            <div class="pix-field-custom-megamenucol description description-wide">
		                <label>
		                    <?php esc_html_e( 'Mega Menu Columns', 'rigel' ); ?><br />
		                </label>
						<?php 
							$item->megamenucol = (isset($item->megamenucol) && !empty($item->megamenucol)) ? $item->megamenucol : 2;
						?>
						<div class="switch-toggle switch-5 switch-candy" onclick="">
							<input type="radio" id="edit-menu-item-megamenucol2-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" class="col2-menu" value='2'  <?php checked( 2, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol2-<?php echo $item_id; ?>" onclick=""><?php esc_html_e('2','rigel' ); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol3-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='3'  <?php checked( 3, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol3-<?php echo $item_id; ?>" onclick=""><?php esc_html_e('3','rigel' ); ?></label>

							<input type="radio" id="edit-menu-item-megamenucol4-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='4'  <?php checked( 4, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol4-<?php echo $item_id; ?>" onclick=""><?php esc_html_e('4','rigel' ); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol5-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='5'  <?php checked( 5, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol5-<?php echo $item_id; ?>" onclick=""><?php esc_html_e('5','rigel' ); ?></label>
                                                       
                                                        <input type="radio" id="edit-menu-item-megamenucol6-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]" value='6'  <?php checked( 6, $item->megamenucol ); ?>>
							<label for="edit-menu-item-megamenucol6-<?php echo $item_id; ?>" onclick=""><?php esc_html_e('6','rigel' ); ?></label>
							<a></a>
						</div>
						
		            </div>

		            <?php //Mega Menu position ?>
		            <p class="pix-field-custom-megamenupos description description-wide">
		                <label for="edit-menu-item-megamenupos-<?php echo $item_id; ?>">
		                    <?php esc_html_e( 'Mega Menu Position', 'rigel' ); ?><br />
							<span class="switch-light switch-candy" onclick="">
								<input type="checkbox" id="edit-menu-item-megamenupos-<?php echo $item_id; ?>" name="menu-item-megamenupos[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenupos); ?>>
								<span><span><?php esc_html_e('Left','rigel' ); ?></span><span><?php esc_html_e('Right','rigel' ); ?></span></span><a></a>
							</span>
		                </label>
		            </p>

	            </div>

	            <?php //Mega Menu Title ?>
	            <p class="pix-field-custom-megamenutitle description description-wide">
	                <label for="edit-menu-item-megamenutitle-<?php echo $item_id; ?>">
	                    <?php esc_html_e( 'Hide Title (only hide if mega menu enabled)', 'rigel' ); ?><br />
						<span class="switch-light switch-candy" onclick="">
							<input type="checkbox" id="edit-menu-item-megamenutitle-<?php echo $item_id; ?>" name="menu-item-megamenutitle[<?php echo $item_id; ?>]" value='1'  <?php checked( 1, $item->megamenutitle ); ?>>
							<span><span><?php esc_html_e('Show','rigel' ); ?></span><span><?php esc_html_e('Hide','rigel' ); ?></span></span><a></a>
						</span>
	                </label>
	            </p>

	            <?php //Mega Menu Background Images ?>
	            <div class="pix-field-custom-megamenubgimg description description-wide">
	                <label for="edit-menu-item-megamenubgimg-<?php echo $item_id; ?>">
	                    <?php esc_html_e( 'Insert Background Image', 'rigel' ); ?><br />
	                </label>	
	                <div class="pix-pull-left pix_image_select pix-container">
	                	<input type="hidden" id="edit-menu-item-megamenubgimg-<?php echo $item_id; ?>" class="pix-saved-val widefat code edit-menu-item-megamenubgimg" name="menu-item-megamenubgimg[<?php echo $item_id; ?>]" value='<?php echo $item->megamenubgimg ?>' />
	                	<a href="#" class="select-files" data-title="Insert Images"  data-file-type="image" data-multi-select="false" data-insert="true">Insert Images</a>
	                </div>	                
	                
	            </div>

	            <?php
	            /* New fields insertion ends here */
	            ?>

				<p class="field-move hide-if-no-js description description-wide">
					<label>
						<span><?php esc_html_e( 'Move', 'rigel' ); ?></span>
						<a href="#" class="menus-move-up"><?php esc_html_e( 'Up one', 'rigel' ); ?></a>
						<a href="#" class="menus-move-down"><?php esc_html_e( 'Down one', 'rigel' ); ?></a>
						<a href="#" class="menus-move-left"></a>
						<a href="#" class="menus-move-right"></a>
						<a href="#" class="menus-move-top"><?php esc_html_e( 'To the top', 'rigel' ); ?></a>
					</label>
				</p>

				<div class="menu-item-actions description-wide submitbox">
					<?php if( 'custom' != $item->type && $original_title !== false ) : ?>
						<p class="link-to-original">
							<?php printf( esc_html__('Original: %s','rigel' ), '<a href="' . esc_url( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
						</p>
					<?php endif; ?>
					<a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
					echo wp_nonce_url(
						add_query_arg(
							array(
								'action' => 'delete-menu-item',
								'menu-item' => $item_id,
							),
							admin_url( 'nav-menus.php' )
						),
						'delete-menu_item_' . $item_id
					); ?>"><?php esc_html_e( 'Remove', 'rigel' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );
						?>#menu-item-settings-<?php echo $item_id; ?>"><?php esc_html_e('Cancel', 'rigel' ); ?></a>
				</div>

				<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
				<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
				<input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
				<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
				<input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
				<input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
			</div><!-- .menu-item-settings-->
			<ul class="menu-item-transport"></ul>
		<?php
		$output .= ob_get_clean();
	}
}