<?php

	include_once './vue_generique.php';

	class VueSlider {

		private $contenu;

		public function __construct() {
			$this->contenu = 
			'<div id="slider">
			<div id="slider-wrapper">
				<div id="slider-inner">
					<div id="slider-content">
						<div class="slide">
							<div class="slide1"></div>
						</div>
						<div class="slide">
							<div class="slide2"></div>
						</div>
						<div class="slide">
							<div class="slide3"></div>
						</div>
						<div class="slide">
							<div class="slide4"></div>
						</div>
						<div class="slide">
							<div class="slide5"></div>
						</div>
					</div>
					<div id="slider-controls">
						<a href="#" id="slider-prev"><i class="fa-solid fa-arrow-left"></i></a>
						<a href="#" id="slider-next"><i class="fa-solid fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>';			
		}

		public function getContenu() {
			return $this->contenu;
		}
    }
?>