<?php
$podtype = $_REQUEST['podtype'];
$args = array(
	'post_type' => $podtype,
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
				<article class="item-box item-box-documents item-box-col-1 item-box-left">
					<header class="item-box-head">
						<h2>
							Documents
						</h2>
					</header>
					<div class="item-box-content">
						<div class="item-add-input-wrapper input-wrapper">
							<form>
								<input type="text" class="item-add-input" placeholder="Nouveau document">
								<span class="item-submit"></span>				
							</form>					
						</div>
						<?php 
						$pod = pods( $podtype, get_the_id() );
						$documents = $pod->field( 'documents' );
						//var_dump($interlocuteurs);

						 ?>
						<ul class="item-list">
							<?php 
							if ( ! empty( $documents ) ) {
		foreach ( $documents as $d ) { 
			$id = $d['ID'];
			$url =get_post_meta( $id, 'fichier', true );
			?>
	<li class="item-list-wrapper"><a href="http://docs.google.com/viewer?url=<?php echo $url['guid']; ?>" target="_blank" class="item-list-link"><?php echo $d['post_title']; ?></a><span class="item-list-delete item-delete"></span></li>

							<?php
									} //end of foreach
								} //endif ! empty ( $related )
							?>
						</ul>		
					</div>
				</article>
				<article class="item-box item-box-collaborateurs item-box-col-1 item-box-right">
					<header class="item-box-head">
						<h2>
							Collaborateurs
						</h2>
					</header>
					<div class="item-box-content">
						<div class="item-add-input-wrapper input-wrapper">
							<form>
								<input type="text" class="item-add-input" placeholder="Nouveau collaborateur">
								<span class="item-submit"></span>				
							</form>					
						</div>
						<ul class="item-list">
													<?php 
							$pod = pods( $podtype, get_the_id() );
							$collabs = $pod->field( 'collaborateurs' );
							//var_dump($collabs);
							if ( ! empty( $collabs ) ) {
							foreach ( $collabs as $c ) { 
								$id = $c['ID'];
								?>
							<li class="item-list-wrapper"><div class="item-list-head"><span class="item-list-title"><?php echo $c['display_name']; ?></span><span class="item-list-delete item-delete"></span></div></li>
							<?php
									} //end of foreach
								} //endif ! empty ( $related )
							?>							
						</ul>		
					</div>
				</article>

				<article class="item-box item-box-maquettes item-box-col-1 item-box-left">
					<header class="item-box-head">
						<h2>
							Maquettes
						</h2>
					</header>
					<div class="item-box-content">
						<div class="item-add-input-wrapper input-wrapper">
							<form>
								<input type="text" class="item-add-input" placeholder="Nouvelle maquette">
								<span class="item-submit"></span>				
							</form>					
						</div>
						<div class="item-list-slider-wrapper">
						<ul class="item-list item-list-slider">
													<?php 
							$pod = pods( $podtype, get_the_id() );
							$maquettes = $pod->field( 'maquettes' );
							//var_dump($maquettes);
							if ( ! empty( $maquettes ) ) {
							foreach ( $maquettes as $key => $m ) { 
								$id = $m['ID'];
								$url = get_post_meta( $id, 'screen', true );
								$active ="";
								if($key==0){
									$active='active';
								}
																?>

							<li class="item-list-wrapper <?php echo $active ?>">
								<div class="item-list-head">
									<span class="item-list-title"><?php echo $m['post_title']; ?></span><span class="item-list-delete item-delete"></span>
								</div>
								<div class="item-list-content">
									<div class="item-list-img-wrapper">
										<img src="<?php echo $url['guid'] ?>" alt="<?php echo $m['post_title']; ?>">
									</div>
								</div>
							</li>
							<?php
									} //end of foreach
								} //endif ! empty ( $related )
							?>							
						</ul>	
						<div class="item-list-slider-nav">
							<a href="javascript:void(0)" class="item-list-slider-prev"><</a>
							<a href="javascript:void(0)" class="item-list-slider-next">></a>
							<a href="javascript:void(0)" class="item-list-slider-view-full"><span class="project-eye"></span></a>
						</div>
						</div>	
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