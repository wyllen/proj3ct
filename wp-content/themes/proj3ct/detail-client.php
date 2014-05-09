<?php
$args = array(
	'post_type' => 'client',
	'p' => $_REQUEST['id']
);
// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>
<div class="parent-box-head">
				<div class="content-box-head-input-wrapper input-wrapper">
					<h1 contenteditable="true"><?php echo the_title();?></h1>		
					<span class="item-submit"></span>		
				</div>
			</div>	
			<div class="box-content">
				<article class="item-box item-box-interlocuteur item-box-col-1 item-box-left">
					<header class="item-box-head">
						<h2>
							Interlocuteur
						</h2>
					</header>
					<div class="item-box-content">
						<div class="item-add-input-wrapper input-wrapper">
							<form>
								<input type="text" class="item-add-input" placeholder="Nouvel interlocuteur">
								<span class="item-submit"></span>				
							</form>					
						</div>
						<?php 
						$pod = pods( 'client', get_the_id() );
						$interlocuteurs = $pod->field( 'interlocuteurs' );
						//var_dump($interlocuteurs);

						 ?>
						<ul class="item-list">
							<?php 
							if ( ! empty( $interlocuteurs ) ) {
		foreach ( $interlocuteurs as $i ) { 
			$id = $i['ID'];
			?>
							<li class="item-list-wrapper">
								<div class="item-list-head">
									<span class="item-list-title" contenteditable="true"><?php echo $i['post_title']; ?></span>
									<span class="item-list-delete item-delete"></span>									
								</div>
								<div class="item-list-content">
									<ul class="item-list-sub-list">
										<li class="item-list-sub-list-element">
											<span class="item-list-sub-list-element-label project-mail"></span>
											<span class="item-list-sub-list-element-value" contenteditable="true"><?php echo get_post_meta( $id, 'e_mail', true ); ?></span>
										</li>
										<li class="item-list-sub-list-element">
											<span class="item-list-sub-list-element-label project-phone"></span>
											<span class="item-list-sub-list-element-value" contenteditable="true"><?php echo get_post_meta( $id, 'telephone', true ); ?></span>
										</li>
										<li class="item-list-sub-list-element">
											<span class="item-list-sub-list-element-label project-study"></span>
											<span class="item-list-sub-list-element-value" contenteditable="true"><?php echo get_post_meta( $id, 'poste', true ); ?></span>
										</li>
									</ul>
								</div>
							</li>
							<?php
									} //end of foreach
								} //endif ! empty ( $related )
							?>
						</ul>		
					</div>
				</article>
				<article class="item-box item-box-projets item-box-col-1 item-box-right">
					<header class="item-box-head">
						<h2>
							Projets
						</h2>
					</header>
					<div class="item-box-content">
						<div class="item-add-input-wrapper input-wrapper">
							<form>
								<input type="text" class="item-add-input" placeholder="Nouveau projet">
								<span class="item-submit"></span>				
							</form>					
						</div>
						<ul class="item-list">
													<?php 
							$pod = pods( 'client', get_the_id() );
							$projets = $pod->field( 'projets' );
							if ( ! empty( $projets ) ) {
							foreach ( $projets as $p ) { 
								$id = $p['ID'];
								?>
							<li class="item-list-wrapper"><a href="" class="item-list-link"><?php echo $p['post_title']; ?></a><span class="item-list-delete item-delete"></span></li>
							<?php
									} //end of foreach
								} //endif ! empty ( $related )
							?>							
						</ul>		
					</div>
				</article>
			</div>

<?php
	}
			} else {
		echo '<div class="parent-box-head">
				<div class="content-box-head-input-wrapper input-wrapper">
					<p>Pas de client</p>				
				</div>
			</div>	';
}
/* Restore original Post Data */
wp_reset_postdata();
?>